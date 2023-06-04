<?php

namespace App\Modules\Dashboard\Controllers;

use App\Modules\UsersLogic\User\Controllers\GenerateHeader;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowTimedOutPage
{
    use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController(Request  $request)
    {
       if(! Str::contains(\Illuminate\Support\Facades\URL::previous(),"faci-dash/timed_out")){
           $expload=explode('faci-dash',\Illuminate\Support\Facades\URL::previous());

           Session::put(['is_timed_out'=>true,'intended'=>'faci-dash'.$expload[1]]);
       }


        $header = GenerateHeader::run('Tableau de bord', 'icon-home', 'red', 'Accueil');

        $user_info = Auth::user();

        return view('auth.lock_screen', compact('header', 'user_info'))->with(['page_title' => 'Accueil']);
    }
}
