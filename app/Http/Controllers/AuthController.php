<?php

namespace App\Http\Controllers\Api;

//use App\Http\Resources\Registers;
use App\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{
    //
//    public function register(Request $request){
//        $request->validate([
//           'email' =>'required',
//            'name'=> 'required',
//            'password'=> 'required'
//        ]);
//
//        $user = new User();
//        $user->name =$request->name;
//        $user->email =$request->email;
//        $user->gender=$request->gender;
//        $user->password =bcrypt($request->password);
//
//        $check = DB::table('users')->select('email')->where('email','=',$request->email)->exists();
//
//        if($check){
//            return Response::json(array('success'=> 0 ),200);
//        }
//        else {
//
//            $user->save();
//
//            $guzzle = new Client;
//
//            $response = $guzzle->post('http://gymapp.test/oauth/token', [
//                'form_params' => [
//                    'grant_type' => 'password',
//                    'client_id' => '2',
//                    'client_secret' => 'p0m8O4RfGMqGePdiJjYA3yY1wi1AmAKpIiNG3fgI',
//                    'username' => $request->email,
//                    'password' => $request->password,
//                    'scope' => '',
//                ],
//            ]);
//
//            return Response::json(array('data' => $user, 'success' => 1, 'response' => $response->getBody()), 200);
////        return json_decode((string) $response->getBody(), true);
//
//        }
//
//    }

    public function login(Request $request){
        $request->validate([
            'id' =>'required',
            'password'=> 'required'
        ]);

        $user = User::where('id', $request->id)->first();

        if (!$user){
            return response(['status'=>'error','success' => 0, 'meesage'=> 'User not found']);
        }

        if (Hash::check($request->password, $user->password)){
            $guzzle = new Client;

            $response = $guzzle->post('http://gymapp.test/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => '2',
                    'client_secret' => 'p0m8O4RfGMqGePdiJjYA3yY1wi1AmAKpIiNG3fgI',
                    'username'=>$request->email,
                    'password'=>$request->password,
                    'scope' => '',
                ],
            ]);

            return Response::json(array(
                'name'=>$user->name,
                'id' =>$user->id,
                'token'=>$response->access_token,

//                'user_id' => $user->id,
//                'name'=>$user->name,
//                'email'=>$user->email,
//                'success' => 1,
//                'response' => json_decode((string) $response->getBody()), 200));


//            return response(['data'=> json_decode((string) $response->getBody(),true)]
            ));
//
        }
        else{
            return Response::json(array('success'=>0, 'error'=>'Wrong password'));
        }
    }
}

