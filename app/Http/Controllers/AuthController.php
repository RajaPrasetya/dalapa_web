<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\TiketGangguan;
use App\Models\User;
use App\Models\WorkOrder;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    //Show Home Page
    public function index()
    {
        // get count user with role teknisi
        $teknisi = User::where('role', 'teknisi')->count();

        // get count tiket gangguan
        $tiketGangguan = TiketGangguan::count();
        
        // get all count work order
        $workOrder = WorkOrder::count();

        // get recent activity
        $activities = Activity::with('user')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        if (!auth()->check()) {
            return redirect()->route('login.show');
        }
        return view('Admin.index', compact('teknisi', 'tiketGangguan', 'workOrder', 'activities'));
    }
    
    //Show Login Form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    //Handle Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $remember = $request->has('remember'); // true if checked

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            // Log the login activity
            ActivityLogger::log('login', 'User logged in successfully');
            return redirect()->route('home')->with('success', 'Login successful');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ])->withInput();
    }

    //Handle Logout
    public function logout()
    {
        ActivityLogger::log('logout', 'User logged out');
        auth()->logout();
        return redirect()->route('login.show')->with('success', 'Logout successful');
    }
}
