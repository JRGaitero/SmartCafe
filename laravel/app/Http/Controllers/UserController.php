<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phoneNumber = $request->phoneNumber;
        $user->role = $request->role;
        if ($request->file('profile_pic')) {
            $user->profile_pic = Storage::url($request->file('profile_pic')->store('public/images'));
        }

        $user->save();
        return $user->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->email) {
            $user->email = $request->email;
        }
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if ($request->phoneNumber) {
            $user->phoneNumber = $request->phoneNumber;
        }
        if ($request->role) {
            $user->role = $request->role;
        }
        if ($request->file('profile_pic')) {
            $user->profile_pic = Storage::url($request->file('profile_pic')->store('public/images'));
        }

        $user->save();

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::destroy($id);
        return $user;
    }

    public function passwordUpdate(Request $request) {
        if (!Hash::check($request->password, auth()->user()->password))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }
        $user = User::findOrFail(auth()->user()->id);

        $user->password = Hash::make($request->newPassword);

        $user->save();
    }
}
