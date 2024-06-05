<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Coupon;
use App\Models\Reserv;
use App\Models\Package;

use Illuminate\Http\Request;

class adminController extends Controller
{
public function admin(){
    $packages = Package::all();
    $packageCount = $packages->count();
    $clients = Client::all();
    $clientCount = $clients->count();
    $reservations = Reserv::all();
    $reservCount = $reservations->count();
    $coupons = Coupon::all();
    $couponCount = $coupons->count();


    return view('Admin.indexAdmin', compact('packages', 'packageCount', 'clients', 'clientCount','reservations','reservCount','coupons','couponCount'));
}

public function ListeClient(){
    $clients = Client::all();
    return view ('Admin.Clients.ListeClient',compact('clients'));
}


public function deleteClient($id){
    $client=Client::find($id);
    $client ->delete();
    return redirect ('/ListeClient')->with('status','the client has been successfully deleted');
}

}
