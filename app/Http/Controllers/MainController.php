<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassRequest;
use App\Models\PassType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\PassService;

class MainController extends Controller
{
    use VerifiesEmails;

    protected $passService;
    public function __construct(PassService $passService)
    {
        $this->passService = $passService;
    }
    public function index()
    {
        return view('main.index');
    }

    public function pass(User $user)
    {
        $user = Auth::user();
        $passTypes = PassType::all();
        $today = Carbon::today();
        $passStartDate = Carbon::parse($user->pass_start_date);
        $passEndDate = Carbon::parse($user->pass_end_date);
        $passCalculations = $this->passService->calculateRemainingDays($passStartDate, $passEndDate);

        return view('main.pass', compact(
            'user', 
            'passTypes', 
            'passStartDate', 
            'passEndDate', 
            'today', 
            'passCalculations'
        ));
    }
    public function update(PassRequest $request)
    {
        $user = User::find(Auth::id());
        $passType = PassType::find($request->validated()['passType']);
        $passStartDate = Carbon::parse($request->validated()['passStartDate']);
        $passEndDate = $passStartDate->copy()->addDays($passType->duration);

        $user->update([
            'pass_type_id' => $passType->id,
            'pass_start_date' => $passStartDate,
            'pass_end_date' => $passEndDate,
        ]);

        return redirect(route("main.pass"))->with('status', __('shop.user.status.update.success'));
    }

}
