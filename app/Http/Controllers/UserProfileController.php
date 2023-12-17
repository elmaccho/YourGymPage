<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileRequest;
use App\Models\Order;
use App\Models\User;
use App\Services\PassService;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    protected $passService;
    public function __construct(PassService $passService)
    {
        $this->passService = $passService;
    }
    public function index(): View
    {
        $user = Auth::user();

        $passStartDate = Carbon::parse($user->pass_start_date);
        $passEndDate = Carbon::parse($user->pass_end_date);
        $passCalculations = $this->passService->calculateRemainingDays($passStartDate, $passEndDate);
        $orders = Order::where('user_id', $user->id)->paginate(15);
        $today = Carbon::today();

        return view ('profile.index', compact(
            'user',
            'passStartDate',
            'passEndDate',
            'passCalculations',
            'today',
            'orders',
        ));
    }
    public function update(UserProfileRequest $request, User $user)
    {
        if ($request->hasFile("userProfile") && $request->file("userProfile")->isValid()) {
            $user->image_path = $request->file("userProfile")->store("users");
            $user->save();
            return redirect(route("profile.index"))->with('status', 'Zaktualizowano zdjęcie profilowe');
        } else {
            return redirect()->back()->with('error', 'Błąd podczas przesyłania pliku');
        }
    }
}
