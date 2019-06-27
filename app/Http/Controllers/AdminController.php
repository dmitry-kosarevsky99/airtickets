<?php

namespace Airtickets\Http\Controllers;

use Illuminate\Http\Request;
use Airtickets\User;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct() {
        // only Admin have access
        $this->middleware('admin');
    }
    
    public function __invoke() {
        return view('admin');
    }
    public function showAllUsers()
    {
        $users = DB::table('users')
        ->where('role','1')->get();
        $usersData = $users->toArray();
        return view('users_all',array('users'=> $usersData));
    }
    public function ban($id)
    {
        $user = DB::table('users')
        ->where('id',$id)->get();
        
        $user->pluck('id');

        return view('ban_user',array('user'=>$user->toArray() ));
    }
    public function store(Request $request, $id)
    {
        $data = $request->all();
        Validator::make($request->all(),[
            'banned_until' =>'required|regex:/(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/',
        ])->validate();
        $user = User::where('id',$id)->pluck('id')->toArray();
        $banned_until = Carbon::parse($data['banned_until']);
        User::where('id',$id)->update(array(
            'banned_until' => $banned_until
        ));
        return redirect()->action('AdminController@showAllUsers')->with('message','Banned');
    }
    public function unban($id)
    {
        User::where('id',$id)->update(array(
            'banned_until' => null
        ));
        return redirect()->action('AdminController@showAllUsers')->with('message','Unbanned');
    }
}
