<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SocieteController extends Controller
{

    public function index(Request $request)
    {

    }

    public function create(Request $request)
    {

    }

    public function update(Request $request, Societe $societe)
    {

    }

    public  function destroy(Request $request, Societe $societe)
    {
        $request->validate([
            'password' => ['required', 'current-password'],
        ]);

        $societe->delete();

        return back();
    }

}
