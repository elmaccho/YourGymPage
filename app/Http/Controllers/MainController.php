<?php

namespace App\Http\Controllers;

use App\Models\PassType;
use Illuminate\Http\Request;

class MainController extends Controller
{
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
}
