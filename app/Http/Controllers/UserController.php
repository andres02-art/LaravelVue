<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'credentials' => 'required',
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        $Duplicate_entry = $this->index();
        foreach ($Duplicate_entry as $key => $value) {
            if ($value->credentials == $request->credentials) {
                return redirect()->route('signUp')->with('fail', "User already exits, log in and update your user");
            }
        }
        $User = new User();
        $User->credentials = $request->credentials;
        $User->name = $request->name;
        $User->lastname = $request->lastname;
        $User->email = $request->email;
        $User->password = $request->password;
        $User->save();

        return redirect()->route('signUp')->with('success', "User {$request->name} has been register");
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'credentials' => 'required',
            'name' => 'required|min:3',
            'lastname' => 'required|min:3',
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        $User = new User();
        $update = ['credentials' => $request->credentials,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password];
        $User->update($update);

        return redirect()->route('signUp')->with('success', "User {$request->name} has been updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
