@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Hot News List&nbsp;&nbsp;
                    <a href="{{url('/hotnews/create')}}" class="btn btn-link btn-sm">New</a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Image</th>
                                <th>Short Description</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($hotnews as $hot)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td><img src="{{URL::asset('/img/').'/'.$hot->photo}}" width="65"/></td>
                                    <td>{{$hot->short_description}}</td>
                                    <td>{{$hot->date}}</td>
                                    <td>
                                        <a href="{{url('/hotnews/edit/'.$hot->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('/hotnews/delete/'.$hot->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $hotnews->links() }}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection