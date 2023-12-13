<?php

namespace App\Http\Controllers;

use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\Profile\UpdateEmailRequest;
use App\Http\Requests\Profile\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function index($id_user) {
        $user = User::byHash($id_user);
        return view('app.profile.index', ['pageTitle' => 'Profil Akun', 'user' => $user]);
    }

    public function updateEmail(UpdateEmailRequest $request, $id_user) {
        $request->validated();

        $user = User::byHash($id_user);
        $user->email = $request->email;
        $user->save();

        Toast::title('Email anda berhasil diperbaruhi')->autoDismiss(3);

        return redirect()->route('profile.index', $user->hash);
    }

    public function updatePassword(PasswordRequest $request, $id_user){
        $request->validated();

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        Toast::title('Password anda berhasil diperbaruhi')->autoDismiss(3);

        return redirect()->route('profile.index', $id_user);
    }

    /**
     * Display the user's profile form.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
