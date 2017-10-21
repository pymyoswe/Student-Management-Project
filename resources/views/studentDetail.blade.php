@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <i class="fa fa-database fa-lg"></i> About : {{$detailId->name}}
                    </div>

                    <div class="panel-body">

                        <div class="row" id="student_detail">
                            <div class="col-md-8">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-list-alt fa-lg"></i> Detail
                                    </div>

                                    <div class="panel-body">

                                        <img src="{{route('getImage',['stdPhoto'=>$detailId->image])}}" width="100px">
                                        <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><i class="fa fa-arrow-circle-right"></i> Roll Number</td>
                                                <td>{{$detailId->year_major}}-{{$detailId->roll_number}}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa fa-arrow-circle-right"></i> Academic Year</td>
                                                <td>{{date('Y',strtotime($detailId->created_at))}}-{{date('Y',strtotime($detailId->created_at))+1}}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa fa-arrow-circle-right"></i> Father Name</td>
                                                <td>{{$detailId->father_name}}</td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa fa-arrow-circle-right"></i> Phone Number</td>
                                                <td><a href="tel::{{$detailId->ph_number}}">{{$detailId->ph_number}}</a></td>
                                            </tr>
                                            <tr>
                                                 <td><i class="fa fa-arrow-circle-right"></i> Address</td>
                                                 <td>{{$detailId->address}}</td>
                                            </tr>


                                        </tbody>

                                    </table>

                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#{{$detailId->id}}">
                                            Remove
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="{{$detailId->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                                        <a href="{{route('deleteStudent',['id'=>$detailId->id])}}" class="btn btn-primary">Yes</a> </td>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <i class="fa fa-list-alt fa-lg"></i> Update
                                    </div>

                                    <div class="panel-body">

                                        <form role="form" action="{{route('updateStudent')}}" method="post" enctype="multipart/form-data">
                                            <input type="hidden" value="{{$detailId['id']}}" name="id" id="id">
                                            <div class="form-group">
                                                @if($errors->has('image'))<span class="help-block"></span>{{$errors->first('image')}}
                                                @endif
                                                <label for="image"><i class="fa fa-photo fa-lg"aria-hidden="true"></i> <u>Photo</u></label>
                                                <input type="file" name="image" id="image">
                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('year_major'))<span class="help-block"></span>{{$errors->first('year_major')}}

                                                @endif

                                                    <select name="year_major">
                                                        <option value="{{$detailId->year_major}}">{{$detailId->year_major}}</option>

                                                    @foreach($y as $yearMajor)
                                                        <option value="{{$yearMajor->year_major}}">{{$yearMajor->year_major}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('roll_number'))<span class="help-block"></span>{{$errors->first('roll_number')}}

                                                @endif
                                                <input type="text" name="roll_number" id="roll_number" placeholder="Roll Number" value="{{$detailId->roll_number}}">

                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('name'))<span class="help-block"></span>{{$errors->first('name')}}
                                                @endif
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{$detailId->name}}">
                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('father_name'))<span class="help-block"></span>{{$errors->first('father_name')}}
                                                @endif
                                                <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Father Name" value="{{$detailId->father_name}}">
                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('ph_number'))<span class="help-block"></span>{{$errors->first('ph_number')}}
                                                @endif
                                                <input type="text" class="form-control" name="ph_number" id="ph_number" placeholder="Phone Number" value="{{$detailId->ph_number}}">
                                            </div>
                                            <div class="form-group">
                                                @if($errors->has('address'))<span class="help-block"></span>{{$errors->first('address')}}
                                                @endif
                                                <textarea class="form-control" name="address" id="address" placeholder="Address" >{{$detailId->address}}</textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>

                                            {{csrf_field()}}

                                        </form>
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



@endsection
