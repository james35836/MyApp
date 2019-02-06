<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Carbon\Carbon;
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
    public function index()
    {
        $data['employee'] = User::get();

        return view('home',$data);
    }

    public function add(Request $request)
    {
        $insert['name']         = $request->name;
        $insert['email']        = $request->email;
        $insert['password']        = bcrypt("secret");
        $insert['created_at']   = Carbon::now();
        $check = User::where('email',$request->email)->get();

        if(!$check)
        {
            $check = User::where('id',$request->id)->insert($insert);
        }

        $message = $check ? "SUCCESS" : "FAILED";

        return $message;
    }

    public function update(Request $request)
    {
      
        $update['name']         = $request->name;
        $update['email']        = $request->email;
        $update['updated_at']   = Carbon::now();

        $check = User::where('email',$request->email)->where('id','!=',$request->id)->get();

        if(!$check)
        {
            $check = User::where('id',$request->id)->update($update);
        }

        

        $message = $check ? "SUCCESS" : "FAILED";

        return $message;
    }

    public function delete(Request $request)
    {
        $check = User::where('id',$request->id)->delete();
        $message = $check ? "SUCCESS" : "FAILED";

        return $message;
    }


    public function search(Request $request)
    {
        $key = $request->key;

        $data['employee'] = User::where('email','like','%'.$key.'%')->orWhere('name','like','%'.$key.'%')->get();

        return view('search',$data);
    }
}
