<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassRequest;
use App\Models\PassType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    use VerifiesEmails;
    public function index()
    {
        return view('main.index');
    }

    public function pass()
    {
        $passTypes = PassType::all();
        $user = Auth::user();

        return view('main.pass', [
            'user' => $user,
            'passTypes'=> $passTypes
        ]);
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
