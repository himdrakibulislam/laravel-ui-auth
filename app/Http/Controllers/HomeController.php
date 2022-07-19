<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function deposite()
    {
        return view('deposite');
    }
    public function details($id){
        $decrypt =  Crypt::decryptString($id);
        // $user = DB::table('users')->where('id',$decrypt)->first();
        echo $decrypt;
    } 
    public function storePassword(Request $request){
        $password = $request->password;
        $passwordWithHash = Hash::make($password);
        echo $passwordWithHash;
    }
    public function changePassword(Request $request){
        $request->validate([
            'current_password'=> 'required',
            'new_password' => 'required|min:6|max:16|string',
            'confirm_password' => 'required'
        ]);
        $user = Auth::user();
        if(Hash::check($request->current_password,$user->password)){
            // $user->password = Hash::make($request->new_password);
            // $user->save();
            // $data = array(
            //     'password' => Hash::make($request->new_password)
            // );
            $data = array();
            $data['password']   = Hash::make($request->new_password);
            DB::table('users')->where('id',Auth::id())->update($data);
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->back()->with('error','Current Password Not Matched');
        };
        // echo $request->current_password;
    }
}
