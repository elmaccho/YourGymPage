<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\ValueObjects\CartDto;
use App\ValueObjects\CartItem;
use App\ValueObjects\CartItemDto;
use App\Models\Product;
use App\Models\User;
use App\ValueObjects\Cart;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        return view('cart.index', [
            'cart'=> Session::get('cart', new Cart())
        ]);
    }

    public function info(User $user): View
    {
        $user = Auth::user();

        return view('cart.info', [
            'cart'=> Session::get('cart', new Cart()),
            'user'=> $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function store(Product $product): JsonResponse
    {
        $cart = Session::get('cart', new Cart());
        Session::put('cart', $cart->addItem($product));
        return response()->json([
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return JsonResponse
     */
    public function destroy(Product $product): JsonResponse
    {
        try {
            $cart = Session::get('cart', new Cart());
            Session::put('cart', $cart->removeItem($product));
            Session::flash('status', __('shop.product.status.delete.success'));
            return response()->json([
                'status' => 'success'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Wystąpił błąd!'
            ])->setStatusCode(500);
        }
    }
}