@extends('layouts.app')

@section('content')
    <div class="container" id="student_con">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Manage Year And Major</div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="panel panel-success">
                                    <div class="panel-heading"><i class="fa fa-plus-circle"></i> New Year And Major</div>

                                    <div class="panel-body">

                                        <form role="form" action="{{route('newYearMajor')}}" method="post">

                                            <div class="form-group">
                                                @if($errors->has('year_major'))<span class="help-block"></span>{{$errors->first('year_major')}}
                                                @endif
                                                <input type="text" class="form-control" name="year_major" id="year_major" placeholder="Enter Year/Major">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add</button>

                                            {{csrf_field()}}

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="panel panel-danger">
                                    <div class="panel-heading"><i class="fa fa-list"></i> Year and Major List</div>
                                    <div class="panel-body">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Year/Major</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($y as $yearMajor)
                                                <tr>
                                                    <td>{{$yearMajor->year_major}}</td>
                                                    <td><a href="{{route('deleteYearMajor',['id'=>$yearMajor->id])}}"><i class="fa fa-remove fa-lg" aria-hidden="true"></i> Remove</a> </td>
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
