<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->get();
        $success_message = session('success_message');
        $error_message = session('error_message');
        return Inertia::render('Users/Index', compact('users', 'success_message', 'error_message'));
    }

    public function create()
    {
        return Inertia::render('Users/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('users.index')->with('success_message', 'Successful!');
        } catch (Throwable $e) {
            Log::error($e);
            return redirect()->route('users.index')->with('error_message', 'Error!');
        }
    }

    public function edit(Request $request, User $user)
    {
        return Inertia::render('Users/Edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        try {

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            return redirect()->route('users.index')->with('success_message', 'Successful!');
        } catch (Throwable $e) {
            Log::error($e);
            return redirect()->route('users.index')->with('error_message', 'Error!');
        }
    }

    public function destroy(Request $request, User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('success_message', 'Successful!');
        } catch (Throwable $e) {
            Log::error($e);
            return redirect()->route('users.index')->with('error_message', 'Error!');
        }
    }
}
