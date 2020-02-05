<?php

namespace App\Http\Controllers;

use App\attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\User\UserDashboardController;
use PDF;
use APP;
class AttendanceController extends Controller
{



    public function store(Request $request)
    {
      $this->validate($request, [
          'name' => 'required',
          'email' => 'required',
          'date' => 'required',
          'in_at' => 'required',
          'out_at' => 'required',
          'accepted' => 'required'

      ]);
      $attendance =new attendance([
      'name' => $request->post('name'),
      'email' => $request->post('email'),
      'date' => $request->post('date'),
      'in_at' => $request->post('in_at'),
      'out_at' => $request->post('out_at'),
      'accepted' => $request->post('accepted')
      ]);
       $attendance->save();
       // $mail=Auth::user()->email;
       // // $name=Auth::user()->name;
       // // $attendance =attendance::whereemail($name);
       // $attendance = DB::table('attendances')
       // ->where('email', '=', $mail)
       // ->orderBy('id','desc')
       // ->get();
       // return view('user.dashboard',['attendance' => $attendance]);
         return redirect()->route('user.dashboard');



    }
    public function edit(Request $request,$email)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'date' => 'required',
            'in_at' => 'required',
            'out_at' => 'required',
            'accepted' => 'required'

        ]);

        $attendance = attendance::where('email',$email)->latest()
        ->first();
        $attendance->name=$request->name;
        $attendance->email=$request->email;
        $attendance->date=$request->date;
        // $attendance->in_at=$request->in_at;
        $attendance->out_at=$request->out_at;
        $attendance->accepted=$request->accepted;
        $attendance->save();
        $mail=Auth::user()->email;
        // $name=Auth::user()->name;
        // $attendance =attendance::whereemail($name);
        // $attendance = DB::table('attendances')
        // ->where('email', '=', $mail)
        // ->orderBy('id','desc')
        // ->get();
        // return view('user.dashboard',['attendance' => $attendance  
        return redirect()->route('user.dashboard');
    }
    public function monthTime($data)
    {
     $a="%-";
     $b="1";
     $c="-%";
     $serch=$a.$data.$c;
    $mail=Auth::user()->email;
    $attendance = DB::table('attendances')
                ->where('date', 'like',$serch )
                -> where('email', '=', $mail)
                ->get();
        return view('user.dashboard',['attendance' => $attendance]);
    }
    public function makePDF()
    {
        $mail=Auth::user()->email;
        $attendance = DB::table('attendances')
                    -> where('email', '=', $mail)
                    ->get();
         $pdf=PDF::loadview('user.pdfdoc',['attendance' => $attendance]);
         return $pdf->download('x.pdf');

    }

}


