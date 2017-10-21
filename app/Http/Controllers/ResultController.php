<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Student;
use App\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ResultController extends Controller
{
    //
    public function examResult(){
        Session::forget('stdId');
        Session::forget('stdName');
        Session::forget('roll_number');
        Session::forget('yearMajor');
        $student=Student::OrderBy('id','desc')->get();
        $ym=Year::OrderBy('id')->get();
        return view('examResult')->with(['y'=>$ym])->with(['student'=>$student]);

    }

    public function viewBy(Request $request){
        $viewBy=$request['viewBy'];
        $student=Student::WHERE('year_major',$viewBy)->OrderBy('id','desc')->get();
        $ym=Year::OrderBy('id')->get();
        return view('examResult')->with(['y'=>$ym])->with(['student'=>$student]);
    }

    public function idTo($id){
        $student=Student::WHERE('id',$id)->first();
        Session::put('stdId',$student->id);
        Session::put('stdName',$student->name);
        Session::put('rollNumber',$student->roll_number);
        Session::put('yearMajor',$student->year_major);


        $student=Student::OrderBy('id','desc')->get();
        $ym=Year::OrderBy('id')->get();
        return view('examResult')->with(['y'=>$ym])->with(['student'=>$student]);



    }



    public function newMarks(Request $request){
        $this->validate($request,[
            'subOne'=>'required',
            'subTwo'=>'required',
            'subThree'=>'required',
            'subFour'=>'required',
            'subFive'=>'required',
            'subSix'=>'required',
            'subSeven'=>'required',

        ]);

        $student_id=$request['student_id'];
        $m=Mark::WHERE('student_id',$student_id)->first();

        if($m){
            return redirect()->back()->with('info','Already exist.');
        }



        $mark=new Mark();
        $mark->subOne=$request['subOne'];
        $mark->subTwo=$request['subTwo'];
        $mark->subThree=$request['subThree'];
        $mark->subFour=$request['subFour'];
        $mark->subFive=$request['subFive'];
        $mark->subSix=$request['subSix'];
        $mark->subSeven=$request['subSeven'];
        $mark->student_id=$student_id;

        $mark->save();
        return redirect()->back();
    }


}
