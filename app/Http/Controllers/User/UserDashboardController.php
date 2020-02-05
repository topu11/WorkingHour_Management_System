<?php

namespace App\Http\Controllers\User;

use App\attendance;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;


class UserDashboardController extends Controller
{
    public function index()
    {
        // $attendance = attendance::all();
        // return view('user.dashboard')->with('attendance',$attendance);
        $mail=Auth::user()->email;
        // $name=Auth::user()->name;
        // $attendance =attendance::whereemail($name);
        $attendance = DB::table('attendances')
        ->where('email', '=', $mail)
        ->orderBy('id','desc')
        ->get();
        return view('user.dashboard',['attendance' => $attendance]);

    }
    public function inTime()
    {

        return view('user.inTime');
    }
    public function outTime()
    {

        return view('user.outTime');
    }
    // public function outTime()
    // {
    //     //   $attendance = attendance::all();
    //      $mail=Auth::user()->email;
    //     // $name=Auth::user()->name;
    //     // $attendance =attendance::whereemail($name);
    //     $attendance = DB::table('attendances')
    //     ->where('email', '=', $mail)
    //     ->get();
    //     return view('user.outTime',['attendance' => $attendance]);
    // }

}
