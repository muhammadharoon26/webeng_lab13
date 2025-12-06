<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Standard Breeze Authentication
        $request->authenticate();
        $request->session()->regenerate();

        // ==========================================
        // 2. LAB TASK: Automatic Session Creation
        // ==========================================
        
        $user = Auth::user();

        // A. Create Basic Session Variables
        session([
            'username'        => $user->name,
            'role'            => 'Administrator', // Static for now, or fetch from DB if you added roles
            'last_login_time' => \Carbon\Carbon::now()->toDayDateTimeString(),
            'login_counter'   => session('login_counter', 0) + 1, // Increment count for this browser session
        ]);

        // B. Create Associative Array for Academic Data
        $academicData = [
            'course'   => 'Web Engineering',
            'semester' => '5th Semester',
            'year'     => '2025'
        ];

        // C. Convert Array to JSON using json_encode()
        $jsonPayload = json_encode($academicData);

        // D. Store JSON in Session
        session(['academic_data_json' => $jsonPayload]);

        // ==========================================
        
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
