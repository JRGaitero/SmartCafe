<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use App\Models\School;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        $user = new User();

        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phoneNumber = $request->phoneNumber;
        $user->role = $request->role;
        if ($request->file('profile_pic')) {
            $user->profile_pic = Storage::url($request->file('profile_pic')->store('public/images'));
        }

        $user->save();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()
            ->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer']);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()
                ->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        if ($user->role == 'school') {
            $userId = School::where('user_id', $user->id)->first();
        } elseif ($user->role == 'student') {
            $userId = Student::where('user_id', $user->id)->first();
        } else {
            $userId = Cafe::where('user_id', $user->id)->first();
        }

        return response()
            ->json(['role' => $user->role, 'id' => $userId->id,'access_token' => $token, 'token_type' => 'Bearer', ]);
    }

    // method for user logout and delete token
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You have successfully logged out and the token was successfully deleted'
        ];
    }

    public function profile()
    {
        return School::with('user')->where('user_id', auth()->user()->id)->get();
    }
}
