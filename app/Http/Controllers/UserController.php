<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getRegister()
    {   
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {   
        
        DB::table('users')->insert([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'username' => $request->username,
            'emailaddress' => $request->email,
            'password' => $request->password,
        ]);


        return redirect('/login');
    }



    public function getLogin(Request $request)
    {   
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {   
        $user = DB::table('users')->where('emailaddress', $request->email)->where('password', $request->password)->select('userid', 'username', 'fname', 'lname')->first();

        if($user)
        {
            // $_SESSION['user'] = $user;
            session(['user' => $user]);
            return redirect('/');
        }
        else
        {
            return redirect('/login');
        }
    }

    public function getLogout()
    {   
        session(['user' => '']);
        return redirect('/login');
    }
}
