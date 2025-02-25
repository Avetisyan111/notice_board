<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function login(): View
    {
        return view('login');
    }

    public function getRole($email): string
    {
        $user = User::where('email', $email)->first();

        return $user ? $user->role : 'user';
    }

    public function run(LoginRequest $request): RedirectResponse
    {
        $request->error();

        $email = $request->only('email');
        $role = $this->getRole($email['email']);

        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('dashboard');
    }
}
