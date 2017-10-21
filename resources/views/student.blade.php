@extends('layouts.app')

@section('content')
    <div class="container" id="student_con">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Manage Student</div>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="panel panel-success">
                                    <div class="panel-heading"><i class="fa fa-plus-circle"></i> New Student

                                    </div>

                                    <div class="panel-body">

                                        <form role="form" action="{{route('newStudent')}}" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                @if($errors->has('image'))<span class="help-block"></span>{{$errors->first('image')}}
                                                    @endif
                                                <label for="image"><i class="fa fa-photo fa-lg"aria-hidden="true"></i> Photo</label>
                                                <input type="file" name="image" id="image">
                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('year_major'))<span class="help-block"></span>{{$errors->first('year_major')}}

                                                @endif
                                                <label>Year/Major : </label>
                                                <select name="year_major">
                                                    @foreach($y as $yearMajor)
                                                        <option value="{{$yearMajor->year_major}}">{{$yearMajor->year_major}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('roll_number'))<span class="help-block"></span>{{$errors->first('roll_number')}}

                                                @endif
                                                <input type="text" class="form-control" name="roll_number" id="roll_number" placeholder="Roll Number">

                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('name'))<span class="help-block"></span>{{$errors->first('name')}}
                                                @endif
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('father_name'))<span class="help-block"></span>{{$errors->first('father_name')}}
                                                @endif
                                            <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Father Name">
                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('ph_number'))<span class="help-block"></span>{{$errors->first('ph_number')}}
                                                @endif
                                                <input type="text" class="form-control" name="ph_number" id="ph_number" placeholder="Phone Number">
                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('address'))<span class="help-block"></span>{{$errors->first('address')}}
                                                @endif
                                            <textarea class="form-control" name="address" id="address" placeholder="Address"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add</button>

                                                {{csrf_field()}}

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="panel panel-primary">
                                    <div class="panel-body">
                                       <form class="navbar-form navbar-left" action="{{route('viewBy')}}" method="post">
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
                                                <th>Roll Number</th>
                                                <th>Name</th>
                                                <th>Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($student as $std)
                                                <tr>
                                                    <td>{{$std->year_major}}-{{$std->roll_number}}</td>
                                                    <td><a href="{{route('studentDetail',['name'=>$std->name])}}" title="View Detail"><i class="fa fa-arrow-right"></i> {{$std->name}}</a></td>
                                                    <td><!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#{{$std->id}}">
                                                            <i class="fa fa-remove fa-lg" aria-hidden="true"></i> Remove
                                                        </button>
                                                    </td>
                                                </tr>

                                                <!-- Modal -->
                                                <div class="modal fade" id="{{$std->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">Confirm</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure went to delete?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                                <a href="{{route('deleteStudent',['id'=>$std->id])}}" class="btn btn-primary">Yes</a> </td>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
