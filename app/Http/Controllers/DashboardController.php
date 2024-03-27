<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        if($request->user()->isAdmin())
            return redirect()->route('dashboard');
        else
            return redirect()->route('accueil');
    }

    public function dashboard(Request $request)
    {
        return Inertia::render('Auth/Dashboard');
    }

}
