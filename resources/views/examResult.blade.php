@extends('layouts.app')

@section('content')
    <div class="container" id="student_con">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading"><i class="fa fa-cog fa-lg" aria-hidden="true"></i> Manage Exam Mark</div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="panel panel-success">
                                    <div class="panel-heading"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        @if(Session::has('stdId'))
                                            {{Session::get('yearMajor')}}-{{Session::get('rollNumber')}} >>> {{Session::get('stdName')}}
                                            @endif

                                    </div>

                                    <div class="panel-body">
                                        @if(Session('info'))
                                            {{Session('info')}}


                                            @endif

                                        @if(Session::has('stdId'))



                                        <form role="form" action="{{route('newMarks')}}" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="student_id" id="student_id" value="{{Session::get('stdId')}}" >
                                            <div class="form-group">
                                                @if($errors->has('subOne'))<span class="help-block"></span>{{$errors->first('subOne')}}

                                                @endif
                                                <input type="number" class="form-control" name="subOne" id="subOne" placeholder="Subject One">

                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('subTwo'))<span class="help-block"></span>{{$errors->first('subTwo')}}

                                                @endif
                                                <input type="number" class="form-control" name="subTwo" id="subTwo" placeholder="Subject Two">

                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('subThree'))<span class="help-block"></span>{{$errors->first('subThree')}}

                                                @endif
                                                <input type="number" class="form-control" name="subThree" id="subThree" placeholder="Subject Three">

                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('subFour'))<span class="help-block"></span>{{$errors->first('subFour')}}

                                                @endif
                                                <input type="number" class="form-control" name="subFour" id="subFour" placeholder="Subject Four">

                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('subFive'))<span class="help-block"></span>{{$errors->first('subFive')}}

                                                @endif
                                                <input type="number" class="form-control" name="subFive" id="subFive" placeholder="Subject Five">

                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('subSix'))<span class="help-block"></span>{{$errors->first('subSix')}}

                                                @endif
                                                <input type="number" class="form-control" name="subSix" id="subSix" placeholder="Subject Six">

                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('subSeven'))<span class="help-block"></span>{{$errors->first('subSeven')}}

                                                @endif
                                                <input type="number" class="form-control" name="subSeven" id="subSeven" placeholder="Subject Seven">

                                            </div>

                                            <button type="submit" class="btn btn-primary">Entry</button>

                                            {{csrf_field()}}

                                        </form>

                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                        <form class="navbar-form navbar-left" action="{{route('examViewBy')}}" method="post">
                                            <div class="form-group">
                                                <select name="viewBy" class="pull-right form-control">
                                                    @foreach($y as $yearMajor)
                                                        <option value="{{$yearMajor->year_major}}">{{$yearMajor->year_major}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">View</button>
                                            {{csrf_field()}}
                                        </form>
                                    </div>
                                </div>

                                <div class="panel panel-danger">
                                    <div class="panel-heading"><i class="fa fa-list"></i> Student List</div>
                                    <div class="panel-body">

                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Roll Number</th>
                                                <th>Name</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($student as $std)
                                                <tr>
                                                    <td><a href="{{route('idTo',['id'=>$std->id])}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Entry Marks</a> </td>
                                                    <td>{{$std->year_major}}-{{$std->roll_number}}</td>
                                                    <td><a href="{{route('studentDetail',['name'=>$std->name])}}" title="View Detail"><i class="fa fa-arrow-right"></i> {{$std->name}}</a></td>
                                                </tr>



                                            @endforeach
                                            </tbody>


                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>







@endsection
