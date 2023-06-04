<?php

namespace App\Modules\Dashboard\Controllers;

use App\Modules\UsersLogic\User\Controllers\GenerateHeader;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Lorisleiva\Actions\Concerns\AsAction;

class ShowHomePage
{
    // use AsAction;

    public function handle()
    {
        // ...
    }

    public function asController()
    {
        $product = DB::table('products')->count();
        $client = DB::table('clients')->count();
        $orders = DB::table('orders')->count();
      /*   $orderConfirmed = DB::table('orders')->where('status', 'confirmed')->count(); */
        $contact = DB::table('contacts')->where('status', 'pending')->count();
        $contactTraite = DB::table('contacts')->where('status', 'done')->count();

        $raw_orders = DB::table('raw_orders')->count();

       /*  $last_month = DB::table('orders')->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->where('status', 'completed')->count();
        $this_month = DB::table('orders')->whereMonth('created_at', date('m'))->where('status', 'completed')->count();
        if ($last_month > $this_month) {
            $result = "Négative";
            return $result;
        } elseif ($last_month < $this_month) {
            $result = "Positive";
            return $result;
        } elseif ($last_month == $this_month) {
            $result = "egalite";
            return $result;
        } else {
            return $result;
        } */

        $header = GenerateHeader::run('Tableau de bord', 'icon-home', 'red', 'Accueil');

        $user_info = Auth::user();

        return view('Dashboard::index', compact('header', 'user_info','product', 'client','raw_orders','orders', /* 'orderConfirmed', */ 'contact', 'contactTraite'))->with(['page_title' => 'Accueil']);
    }
}
