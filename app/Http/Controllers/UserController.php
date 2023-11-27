<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Address;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("users.index",[
            "users"=> User::paginate(5)

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $addressValidated = $request->validated()['address'];
        if($user->hasAddress()){
            $address = $user->address;
            $address->fill($addressValidated);
        } else {
            $address = new Address($addressValidated);
        }
        $user->address()->save($address);
        return redirect(route("users.index"))->with('status', __('shop.user.status.update.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try{
            $user->delete();
            Session::flash('status', __('shop.user.status.delete.success'));
            return response()->json([
                'status' => 'success'
            ]);
        } catch(\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Wystąpił błąd'
            ])->setStatusCode(500);
        }
    }

    // public function search(Request $request)
    // {
    //     $query = $request->input('user_search');
    
    //     $users = User::when($query, function ($queryBuilder) use ($query) {
    //             $keywords = explode(' ', $query);
    //             foreach ($keywords as $keyword) {
    //                 $queryBuilder->where(function ($subquery) use ($keyword) {
    //                     $subquery->where('name', 'like', '%' . $keyword . '%')
    //                              ->orWhere('surname', 'like', '%' . $keyword . '%');
    //                 });
    //             }
    //         })
    //         ->paginate(5);
    // }
    
    
}