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
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Operator;
use App\Models\Villager;
use App\Models\Submission;

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
        // dd(Auth::user()->operator_id);
        $request->validated();

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        Toast::title('Password anda berhasil diperbaruhi')->autoDismiss(3);

        return redirect()->route('profile.index', $id_user);
    }

    public function updateSignature(Request $request){
        $data_uri = $request->signature;
        $encoded_image = explode(",", $data_uri)[1];
        $decoded_image = base64_decode($encoded_image);
        $fileName = uniqid().'.png';

        $operator = Operator::find(Auth::user()->operator_id);
        $operator->signature = $fileName;
        $operator->save();

        Storage::disk('public')->put('signature/'. $fileName, $decoded_image);
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

    public function dashboard(){
        $villager = Villager::all()->count();
        $active_villager = Villager::query()->where('status_account', '1')->count();
        $born_submission = Submission::query()->where('type', Submission::TYPE_BORN)->count();
        $die_submission = Submission::query()->where('type', Submission::TYPE_DIE)->count();
        $poor_submission = Submission::query()->where('type', Submission::TYPE_POOR)->count();

        return view('dashboard', [
            'pageTitle' => "Beranda",
            'villager' => $villager,
            'active_villager' => $active_villager,
            'born_submission' => $born_submission,
            'die_submission' => $die_submission,
            'poor_submission' => $poor_submission
        ]);
    }
}
