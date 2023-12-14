<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        return view('profile.index', [
            'user' => $user
        ]);
    }
}
