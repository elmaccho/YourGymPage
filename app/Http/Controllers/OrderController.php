<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatus;
use App\Http\Requests\OrderAddressRequest;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use App\Models\UserOrderData;
use App\ValueObjects\Cart;
use Devpark\Transfers24\Exceptions\RequestException;
use Devpark\Transfers24\Exceptions\RequestExecutionException;
use Devpark\Transfers24\Requests\Transfers24;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    private Transfers24 $transfers24;

    public function __construct(Transfers24 $transfers24)
    {
        $this->transfers24 = $transfers24;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = Auth::user();

        $userOrderData = $user->userOrderData;

        return view("orders.index", [
            'orders' => Order::where('user_id', $user->id)->paginate(15),
            'userOrderData' => $userOrderData
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderAddressRequest $request): RedirectResponse
    {
        $cart = Session::get('cart', new Cart());
    
        if ($cart->hasItems()) {
            $order = new Order();
            $order->quantity = $cart->getQuantity();
            $order->price = $cart->getSum();
            $order->user_id = Auth::id();
            $order->save();
    
            $productIds = $cart->getItems()->map(function ($item) {
                return ['product_id' => $item->getProductId()];
            });
            $order->products()->attach($productIds);
    
            $userOrderData = new UserOrderData($request->validated()['order']);
            $userOrderData->user_id = Auth::id();
            $userOrderData->order_id = $order->id;
            $userOrderData->save();

            $payment = new Payment();
            $payment->order_id = $order->id;
            $payment->save();
            return $this->paymentTransaction($order);
        }
    
        return back();
    }
    

    private function paymentTransaction(Order $order)
    {
        $payment = new Payment();
        $payment->order_id = $order->id;
        $this->transfers24->setEmail(Auth::user()->email)->setAmount($order->price);
        
        try{
            $response = $this->transfers24->init();

            if($response->isSuccess())
            {
                $payment->status = PaymentStatus::IN_PROGRESS;
                $payment->session_id = $response->getSessionId();
                $payment->save();
                Session::put('cart', new Cart());


                // save registration parameters in payment object
                
                return redirect($this->transfers24->execute($response->getToken()));
            } else {
                $payment->status = PaymentStatus::FAIL;
                $payment->error_code = $response->getErrorCode();
                $payment->error_description = json_encode($response->getErrorDescription());
                $payment->save();
            }
        } catch(RequestException|RequestExecutionException $error) {
            Log::error('Błąd transakcji', ['error' => $error]);
            return back()->with('warning', 'Ups... Coś poszło nie tak!');
        }
    }
}
