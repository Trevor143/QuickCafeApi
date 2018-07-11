<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        $request->validate([
            'id' =>'required',
            'password'=> 'required'
        ]);

        $user = User::where('id', $request->id)->first();
//        $user = User::find($request->id);

        if (!$user){
            return response(['status'=>'error','success' => 0, 'meesage'=> 'User not found']);
        }

        if (Hash::check($request->password, $user->password)){
            $guzzle = new Client;

            $response = $guzzle->post('http://quick.test/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '2',
                    'client_secret' => 'DzYew0EJPHzbtFgaTJvG2kQEzjaTf4PoquLeGtWF',
                    'username'=>$user->email,
                    'password'=>$request->password,
                    'scope' => '',
                ],
            ]);
//            return response(['data'=> json_decode((string) $response->getBody(),true)]);

            return Response::json(array(
                'name'=>$user->name,
                'id' =>$user->id,
                'token'=>json_decode((string) $response->getBody()),
//            return response(['data'=> json_decode((string) $response->getBody(),true)]
            ));
//
        }
        else{
            return Response::json(array('success'=>0, 'error'=>'Wrong password'));
        }
    }

}
