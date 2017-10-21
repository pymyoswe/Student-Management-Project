@extends('layouts.app')

@section('content')

    <div class="container" id="student_con">

        <form class="navbar-form navbar-left" action="{{route('resultViewBy')}}" method="post" id="searchBy">
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

        <div class="row">
            <div class="col-md-8 col-sm-offset-2">

                <div class="panel panel-success">
                    <div class="panel-heading"><i class="fa fa-th-list fa-lg" aria-hidden="true"></i> Exam Results</div>



                    <div class="panel-body">

                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>Roll Number</th>
                                                <th>Name</th>
                                                <th>Result</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($mark as $m)
                                                <tr>
                                                    <td>{{$m->student->roll_number}}</td>
                                                    <td><a href="{{route('detailResult',['id'=>$m->student_id])}}">{{$m->student->name}}</a></td>
                                                    <td>
                                                        @if($m->subOne < 40)
                                                            Failed
                                                            @elseif($m->subTwo < 40)
                                                            Failed
                                                            @elseif($m->subThree < 40)
                                                            Failed
                                                            @elseif($m->subFour < 40)
                                                            Failed
                                                            @elseif($m->subFive < 40)
                                                            Failed
                                                            @elseif($m->subSix < 40)
                                                            Failed
                                                            @elseif($m->subSeven <40)
                                                            Failed
                                                            @else
                                                            Passed

                                                            @endif
                                                    </td>

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







@endsection
