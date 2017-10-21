<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Student;
use App\Year;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function welcome()
    {
        $ym=Year::all();
        $mark=Mark::all();
        return view('welcome')->with(['y'=>$ym])->with(['mark'=>$mark]);


    }

    public function viewBy(Request $request){
        $viewBy=$request['viewBy'];
        $student=Student::WHERE('year_major',$viewBy)->OrderBy('id','desc')->get();
        $ym=Year::OrderBy('id')->get();
        $mark=Mark::all();

        return view('welcome')->with(['y'=>$ym])->with(['student'=>$student])->with(['mark'=>$mark]);
    }

    public function index()
    {
        return view('home');
    }

    public function detailResult($id){
        $mark=Mark::WHERE('student_id',$id)->first();
        return view('resultMark')->with(['mark'=>$mark]);
    }


}
