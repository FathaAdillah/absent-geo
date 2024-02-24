<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function index()
   {
      return view('auth.login', []);
   }

   public function authenticate(Request $request): RedirectResponse
   {
      $credentials = $request->validate([
         'email' => ['required', 'email:dns'],
         'password' => ['required'],
      ]);

      if (Auth::attempt($credentials)) {
         $user = Auth::user()->load('role');
         // Debug statement
         // dd('Authentication successful');

         $request->session()->regenerate();
         if ($user->role->nama == 'superadmin') {
             return redirect()->intended(route('dashboard'));
         } elseif ($user->role->nama == 'user') {
             return redirect()->intended(route('dashboard'));
         }
      }

      // Debug statement
      // dd('Authentication failed');

      return back()->with('loginError', 'Email dan password kamu sepertinya salah');
   }


   public function logout(Request $request)
   {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/');
   }
}
