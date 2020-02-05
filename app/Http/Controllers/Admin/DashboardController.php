<?php

namespace App\Http\Controllers\Admin;

use App\attendance;
use App\LogActivity;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index()
    {

         $attendance = DB::table('attendances')
        ->orderBy('id','desc')
        ->get();
        // $attendance= attendance::all();
        return view('admin.dashboard',['attendance' => $attendance]);
    }
    public function confirm($id)
    {
        $attendance = DB::table('attendances')
        -> where('id', '=', $id)
        ->update(['accepted' => 'yes']);
        return redirect()->route('user.dashboard');
    }
    public function delete($id)
    {
        $attendance = DB::table('attendances')
        -> where('id', '=', $id)
        ->delete();
       return redirect()->route('user.dashboard');
    }
}
