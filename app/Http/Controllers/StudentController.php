<?php

namespace App\Http\Controllers;
use App\Year;
use Illuminate\Http\Request;
use App\Student;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class StudentController extends Controller
{
    public function newStudent(Request $request){
        $this->validate($request,[
            'image'=>'required',
            'year_major'=>'required',
            'roll_number'=>'required',
            'name'=>'required',
            'father_name'=>'required',
            'ph_number'=>'required',
            'address'=>'required'

        ]);

        $std=new Student();
        $std->image=$request['year_major'].$request['roll_number'].$request['name'].'.jpg';
        $std->year_major=$request['year_major'];
        $std->roll_number=$request['roll_number'];
        $std->name=$request['name'];
        $std->father_name=$request['father_name'];
        $std->ph_number=$request['ph_number'];
        $std->address=$request['address'];

        $std->save();

        $photoName=$request['year_major'].$request['roll_number'].$request['name'].'.jpg';
        $photoFile=$request->file('image');
        Storage::disk('local')->put($photoName,File::get($photoFile));
        return redirect()->back();
    }

    public function newYearMajor(Request $request){
        $this->validate($request,[
            'year_major'=>'required',
        ]);
        $yearMajor=new Year();
        $yearMajor->year_major=$request['year_major'];
        $yearMajor->save();

        return redirect()->back();


    }
    public function yearMajor(){
        $ym=Year::OrderBy('id','desc')->get();
        return view('year')->with(['y'=>$ym]);

    }

    public function student(){
        $student=Student::OrderBy('id','desc')->get();
        $ym=Year::OrderBy('id')->get();
        return view('student')->with(['y'=>$ym])->with(['student'=>$student]);
    }

    public function viewBy(Request $request){
        $viewBy=$request['viewBy'];
        $student=Student::WHERE('year_major',$viewBy)->OrderBy('id','desc')->get();
        $ym=Year::OrderBy('id')->get();
        return view('student')->with(['y'=>$ym])->with(['student'=>$student]);
    }

    public function deleteYearMajor($id){
        $year=Year::WHERE('id',$id)->first();
        $year->delete();
        return redirect()->back();
    }

    public function deleteStudent($id){

        $std=Student::WHERE('id',$id)->first();
        Storage::disk('local')->delete($std->image);
        $std->delete();
        return redirect()->route('student');
    }

    public function studentDetail($name){
        $id=Student::WHERE('name',$name)->first();
        $ym=Year::OrderBy('id')->get();
        return view('studentDetail')->with(['y'=>$ym])->with('detailId',$id);
    }
    public function getImage($stdPhoto){

        $file=Storage::disk('local')->get($stdPhoto);
        return new Response($file, 200);
    }

    public function updateStudent(Request $request){

        if($request['image']){

            $id=$request['id'];
            $std=Student::WHERE('id',$id)->first();
            $std->image=$request['year_major'].$request['roll_number'].$request['name'].'.jpg';
            $std->year_major=$request['year_major'];
            $std->roll_number=$request['roll_number'];
            $std->name=$request['name'];
            $std->father_name=$request['father_name'];
            $std->ph_number=$request['ph_number'];
            $std->address=$request['address'];

            $std->update();

            $photoName=$request['year_major'].$request['roll_number'].$request['name'].'.jpg';
            $photoFile=$request->file('image');
            Storage::disk('local')->put($photoName,File::get($photoFile));


            return redirect()->back();


        }
        else{
            $id=$request['id'];
            $std=Student::WHERE('id',$id)->first();
            $std->image=$request['year_major'].$request['roll_number'].$request['name'].'.jpg';
            $std->year_major=$request['year_major'];
            $std->roll_number=$request['roll_number'];
            $std->name=$request['name'];
            $std->father_name=$request['father_name'];
            $std->ph_number=$request['ph_number'];
            $std->address=$request['address'];

            $std->update();

            return redirect()->back();

        }


    }




}
