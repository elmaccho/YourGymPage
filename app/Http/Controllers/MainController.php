<?php

namespace App\Http\Controllers;

use App\Models\PassType;
use App\Models\User;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
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

        return view('main.pass', [
            'passTypes' => $passTypes,
        ]);
    }
    public function verifyUser(Request $request)
    {

    }
}
