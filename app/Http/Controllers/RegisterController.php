<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\User;
use Auth;



class RegisterController extends Controller
{

  public function login(){
      if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
          $user = Auth::user();
          $success['token'] =  $user->createToken('MyApp')-> accessToken;
          return $success;
      }
      else{
          return "Błąd";
      }
  }

  public function register(Request $request)
    {
        /*$validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }*/


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
        $success['email'] = $user->email;

        return $success;
    }

}
