<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show(User $user)
    {
        return view('profile.show', [
            'user' => $user,
            'tweets' => $user
                ->tweets()
                ->withLikes()
                ->paginate(30),
        ]);
    }
    public function edit()
    {
        $user = Auth::user();
        $this->authorize('edit', $user);
        return view('profile.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update()
    {
        $user = Auth::user();
        $this->authorize('edit', $user);

        $attributes = \request()->validate([
            'username' => ['string', 'max:255', 'required'],
            'name' => ['string', 'max:255', 'required'],
            'bio' => ['string'],
            'avatar' =>  ['image'],
            'coverImage' =>  ['image'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore(\auth()->user()->id)],
        ]);
//        $request->user()->fill($request->validated());
        if (request()->hasFile('avatar')) {
            $attributes['avatar'] = request()->file('avatar')->store('avatars');
        }
        if (request()->hasFile('coverImage')) {
            $attributes['coverImage'] = request()->file('coverImage')->store('coverImages');
        }
        $user->update($attributes);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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
