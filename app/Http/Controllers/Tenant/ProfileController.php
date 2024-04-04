<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('tenant.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validated();

        // Check if a profile image file was uploaded
        if ($request->hasFile('profile_image')) {
            $profilePicture = $request->file('profile_image');
            $filename = 'profile_' . $user->id  .  '.' . $profilePicture->getClientOriginalExtension();
            $host = $request->getHost();
            $parts = explode('.', $host);
            $domainName = $parts[0];

            $directoryPath = public_path('domains/' . $domainName . '/images');

            $filename = 'profile_' . $user->id . '.' . $profilePicture->getClientOriginalExtension();

            // Sposta l'immagine nella cartella desiderata
            $profilePicture->move($directoryPath, $filename);

            // Aggiorna il percorso dell'immagine del profilo nei dati
            $data['profile_image'] = 'domains/' . $domainName . '/images/' . $filename;

            // If the email has changed, set the email verification status to null
            if ($request->has('email') && $user->email !== $request->email) {
                $data['email_verified_at'] = null;
            }

            // Update the user with the validated data
            $user->update($data);

            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        }
        return Redirect::route('profile.edit');

    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
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
