<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function create()
    {
        return view('pages/auth/finish-register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|min:4',
            'birthday' => 'required',
            'address' => 'required|min:4'
        ]);
        $user = Auth::user();

        $client = new Client($formFields);
        $client->user_id = $user->id;
        $client->save();

        return redirect('/');
    }

    public function edit()
    {
        $user = User::find(Auth::id());
        $client = $user->client;

        return view('pages/profile/edit', [
            'user' => $user,
            'client' => $client,
        ]);
    }

    public function update(Request $request)
    {
        // $formFields = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'birthday' => 'required|date',
        //     'address' => 'required|string|max:255',
        // ]);

        // $user = User::find(Auth::id());
        // $client = $user->client;
        // if ($client) {
        //     $client->update($formFields);
        // } else {
        //     $formFields['user_id'] = $user->id;
        //     $client = new Client($formFields);
        //     $client->save();
        // }

        return redirect()->route('profile.edit');
    }
}
