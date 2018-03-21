<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        if (Auth::user()->typeuser == 1) {
                return view('index');
            }elseif (Auth::user()->typeuser == 2) {
                return view('index');            
            }elseif (Auth::user()->typeuser == 3) {
                return view('index');
        }
        
    }*/

    public function index()
    {
        if (Auth::user()) {
                return view('index');
            }
    }

    public function redireciona(){
        if (Auth::user()->typeuser == 1) {
            return view('admin');
        }elseif (Auth::user()->typeuser == 2) {
            return view('initPageProvider');            
        }elseif (Auth::user()->typeuser == 3) {
            return view('home');
    }
    }

   

    public function listUsers($id=null)
    {
    $userId =  Auth::user()->id;
       if($id == null){
            return Auth::user()->where('users.id','!=', $userId)->where('users.typeuser','!=', '1')->where('users.typeuser','!=', '2')->get();
        }else{
            return $this->show($id); 
        }
    }

    public function update(UpdateAccount $request)
    {
        $user = Auth::user();
        
        $user->username = Request::input('username');
        $user->email = Request::input('email');

        if ( ! Request::input('password') == '')
        {
            $user->password = bcrypt(Request::input('password'));
        }

        $user->save();

        Flash::message('Your account has been updated!');
        return Redirect::to('/account');
    }
}
