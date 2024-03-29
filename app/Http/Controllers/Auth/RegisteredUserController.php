<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Profile;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        if ( User::first() ) {
            return redirect()-route( 'access-denied' );
        }

        Auth::login($user = User::create([
            'name' => $validated->name,
            'email' => $validated->email,
            'password' => Hash::make($validated->password),
        ]));

        Profile::create([
            'user_id'   => $user->id,
            'is_home'   => $user->id == 1 ? true : false,
            'h1'        => $validated->name,
            'h2'        => 'Subtitle',
            'body'      => "<p>No profile content to display.</p>",
        ]);

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
