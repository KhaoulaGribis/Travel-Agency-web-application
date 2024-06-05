<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
public function LoginRegisterForm(){
      return view('login_register');

}


public function registerUser(Request $request)
{
   $request ->validate ([
    'fullname'=>'required',
    'phone'=> 'required',
    'email'=>'required|email|unique:clients,email',
    'password'=>'required',
   ]);

   $client = new Client;
        $client->name = $request->input('fullname');
        $client->phone = $request->input('phone');
        $client->email = $request->input('email');
        $client->password = $request->input('password');
        $client->role = 'user';
        $client->save();
        return redirect()->route('login_register')->with('success', 'Registration successful! Please log in.');
}

public function loginUser(Request $request){
    $request ->validate ([
    'email'=>'required|email',
    'password'=>'required',
]);

$client=Client::where('email','=',$request->email)->first();

    if ($client && $request->password === $client->password) {
        $request ->session()->put('loginId',$client->id);
        // Vérification du rôle
        if ($client->role === 'admin') {
            // Utilisateur est un administrateur
            return redirect()->route('admin');
        } else {
        return redirect()->route('welcome');
        }
    } else {
        return back()->with('fail', 'Invalid identifications.');
    }
}

public function welcome()
    {
        return view('welcome');
    }


    public function logout(Request $request)
    {

            $request->session()->forget('loginId');
            return redirect()->route('welcome')->with('success', 'You have been logged out.');
            return redirect()->route('welcome');
        }

    }





?>



