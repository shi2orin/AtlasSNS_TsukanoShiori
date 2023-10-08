<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(RegisterFormRequest $request){
        if($request->isMethod('post')){

        $username = $request->input('username');
        $mail = $request->input('mail');
        $password = $request->input('password');

        User::create([
            'username' => $username,
            'mail' => $mail,
            'password' => bcrypt($password),
            'images' =>'storage/images/icon1.png'
        ]);
        $request->session()->put('username', $username);

            return redirect('added')->with('username',$username);
        }
        return view('auth.register');
    }
    //登録にかかわるコード

    public function added(){

    return view('auth.added');
    }
    //addの画面を開くためのコード
}

// ->with('username',$username)
