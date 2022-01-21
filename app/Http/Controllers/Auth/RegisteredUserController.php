<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $image = $request->file('profile_photo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(80,80)->save('image/'.$name_gen);
        $save_url = 'image/'.$name_gen;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'profile_photo' => $save_url,
            'dob' => $request->dob,
            'anniversary_date' => $request->anniversary_date,
            'password' => Hash::make($request->password),

        ]);

        event(new Registered($user));

        Auth::login($user);
        
        return redirect(RouteServiceProvider::HOME);
    }
}
