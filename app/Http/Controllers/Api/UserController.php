<?php

namespace App\Http\Controllers\Api;

use App\Models\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; 
use Illuminate\Support\Facades\Cookie; 

class UserController extends Controller
{
    
    //
    public function todos(){
        return response()->json(["Bacano está a funcionar!"],200);
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);
        
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
        {
            Log::info($credentials);
            return response()->json(['message' => 'Oops!'], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $minutes=60*60*24*30;
        $token = $tokenResult->plainTextToken;
        $cookie = Cookie::make("BH",$token,strtotime("+3 weeks"),'/','',false,false,false,'Lax');
        //$cookie = Cookie::make('BH', $token, $minutes,'','',false,false);
        Log::info($tokenResult);

            //$token->save();
            return response(['access_token' => $tokenResult,'token_type' => 'Bearer','user'=>$user])->withCookie($cookie);
        }
                


    public function register(Request $request)
    {
        $result=$this->show($request->email);
        if(!isset($result[0]))
       {
           $request->validate([
               'username'=> 'required',
               'email' => 'required|string|email|unique:users',
               'password' => 'required|string'
           ]);
           $user= ['username'=>$request->username,'email'=>$request->email,'password'=>Hash::make($request->password)];
           $user=User::create($user);
           return response()->json([
               'message' => 'Criado com sucesso!',"user"=>$user
           ], 201);
           
        }
        return response()->json([
            'message' => 'Already in use!'
        ], 401);
    }


    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }  

    public function show($id)
    {
        $user=User::where('email',$id)->get();
        return $user;
    }
 
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
