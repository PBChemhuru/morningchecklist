<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Monolog\Handler\IFTTTHandler;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;
use function Laravel\Prompts\table;
use function PHPUnit\Framework\isNull;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\checklist_items;
use PhpParser\Node\Stmt\ElseIf_;

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
    public function store(LoginRequest $request) 
    {
        $checklist_items= checklist_items::all();
        $request->authenticate();
        
        $user= auth()->user()->Role;
        if($user=='Analyst')
        {
            $request->session()->regenerate();
            return view('dashboard',['user'=>$user,'checklist_items'=>$checklist_items]);
        }
        elseif($user=='TeamLead')
        {
            $request->session()->regenerate();
            return view('Teamleaderlanding',['user'=>$user]);

        }
        elseif($user=='Manager')
        {
            return view('/Managerlanding',['user'=>$user]);
        }
        else
        {
            return view('/Adminlanding',['user'=>$user]);
        }
    
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
