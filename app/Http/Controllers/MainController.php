<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassRequest;
use App\Models\PassType;
use App\Models\User;
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

    public function pass(User $user)
    {
        $passTypes = PassType::all();

        return view('main.pass', [
            'passTypes' => $passTypes,
            'user' => $user
        ]);
    }
    public function store(PassRequest $request, User $user)
    {
        $user->fill($request->validated());

        $user->save();
        

        return redirect(route("main.pass"))->with('status', 'zakupiono karnet!');
    }
}
