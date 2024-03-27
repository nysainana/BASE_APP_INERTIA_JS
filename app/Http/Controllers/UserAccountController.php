<?php

namespace App\Http\Controllers;

use App\Enums\TypeUser;
use App\Models\Societe;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserAccountController extends Controller
{

    public function index(Request $request){

        $clients = User::where('users.type', '=', TypeUser::CLIENT->value);

        if($q = $request->input('q')){
            $clients = $clients->where(function ($query) use ($q){
                $query->where('name', 'LIKE', $q . '%')
                    ->orWhere('email', 'LIKE', $q . '%');
            });
        }

//        if($o = strtolower($request->input('o')))
//            if($o === 'nc' || $o === 'c')
//                $clients = $clients->where('societes.is_configured', '=', $o === 'nc' ? 0 : 1);

        $clients = $clients->orderBy('name')
            ->paginate(60);

        return Inertia::render("Auth/Clients/index", [
            'clients' => $clients,
            'input' => [
                'q' => $q,
//                'o' => $o
            ]
        ]);
    }

    public function show(Request $request, User $client){

        if(!$societe = $client->societes()->find($request->input('societe')))
            return redirect()->action([UserAccountController::class, 'show'], [
                'client' => $client->id,
                'societe' => $client->societes()->first()->id
            ]);

        $societes = $client->societes()->select('id', 'nom_soc', 'logo_soc')->get()->append('nom_domain');
        $socCount = $client->societes()
                ->where('is_configured', '=', true)
                ->count();

        return Inertia::render("Auth/Clients/Show", [
            'client' => $client,
            'societe' => $societe->load('pointDeVentes'),
            'societes' => $societes,
            'canDelete' => $socCount > 1
        ]);
    }

}
