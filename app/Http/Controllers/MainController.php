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
use Exception;

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

    public function pass()
    {
        if(Auth::check()) {
            $user = Auth::user();

            $passStartDate = Carbon::parse($user->pass_start_date);
            $passEndDate = Carbon::parse($user->pass_end_date);
            $passCalculations = $this->passService->calculateRemainingDays($passStartDate, $passEndDate);
    
            $passTypes = PassType::all();
            $today = Carbon::today();

            if($today > $passEndDate){
                User::where('id', $user->id)->update([
                    'pass_start_date' => null,
                    'pass_end_date' => null,
                    'pass_type_id' => null,
                ]);

                return view('main.pass');
            }
    
            return view('main.pass', compact(
                'user', 
                'passTypes', 
                'passStartDate', 
                'passEndDate', 
                'today', 
                'passCalculations'
            ));
        } else {
            return view('main.pass');
        }
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

            return redirect(route("main.pass"))->with('status', 'Zakupiono karnet!');
    }

}
