<?php

namespace App\Http\Controllers;

use App\Models\PointDeVente;
use App\Models\Societe;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function storeSocImage(Request $request, $type, Societe $societe)
    {
        $type_name = $type . '_file';
        if($file = $request->file($type_name))
        {
            $fileName = $type . '_' . $societe->id . '_' . Carbon::now()->getTimestamp() . '.jpg';

            Storage::disk('images')->putFileAs( $societe->id, $file, $fileName);

            return '/images/'. $societe->id .'/'. $fileName;
        }
        return $societe->getAttribute($type);
    }

    public function storePvImage(Request $request, PointDeVente $pv)
    {
        if($file = $request->file('logo_file'))
        {
            $fileName =  'logo_pv_' . $pv->id . '_' . Carbon::now()->getTimestamp() . '.jpg';
            Storage::disk('images')->putFileAs( $pv->societe->id, $file, $fileName);

            return '/images/'. $pv->societe->id .'/'. $fileName;
        }
        return $pv->getAttribute('logo');
    }

    public function storeUserImage(Request $request, User $user)
    {
        if($file = $request->file('avatar_file'))
        {
            $fileName =  'profile_' . $user->id . '_' . Carbon::now()->getTimestamp() . '.jpg';
            Storage::disk('images')->putFileAs( 'avatar', $file, $fileName);

            return '/images/avatar/'. $fileName;
        }
        return $user->getAttribute('avatar');
    }

}
