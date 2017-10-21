@extends('layouts.app')

@section('content')
    <div class="container" id="student_con">
        <div class="row">
            <div class="col-md-4 col-sm-offset-4">
                <div class="panel @if($mark->subOne < 40)
                        panel-danger
                        @elseif($mark->subTwo < 40)
                        panel-danger
                        @elseif($mark->subThree < 40)
                        panel-danger
                        @elseif($mark->subFour < 40)
                        panel-danger
                        @elseif($mark->subFive < 40)
                        panel-danger
                        @elseif($mark->subSix < 40)
                        panel-danger
                        @elseif($mark->subSeven <40)
                        panel-danger
                        @else
                        panel-success

                        @endif">
                    <div class="panel-heading">
                        <i class="fa fa-user fa-lg" aria-hidden="true"></i>
                        {{$mark->student->name}}
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th>Subject One</th>
                                    <th>{{$mark->subOne}}</th>
                                </tr>
                                <tr>
                                    <th>Subject Two</th>
                                    <th>{{$mark->subTwo}}</th>
                                </tr>
                                <tr>
                                    <th>Subject Three</th>
                                    <th>{{$mark->subThree}}</th>
                                </tr>
                                <tr>
                                    <th>Subject Four</th>
                                    <th>{{$mark->subFour}}</th>
                                </tr>
                                <tr>
                                    <th>Subject Five</th>
                                    <th>{{$mark->subFive}}</th>
                                </tr>
                                <tr>
                                    <th>Subject Six</th>
                                    <th>{{$mark->subSix}}</th>
                                </tr>
                                <tr>
                                    <th>Subject Seven</th>
                                    <th>{{$mark->subSeven}}</th>
                                </tr>

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>








@endsection
