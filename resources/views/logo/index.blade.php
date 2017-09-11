@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Logo List&nbsp;&nbsp;
                    @if (count($logo) == 0)
                        <a href="{{url('/logo/create')}}" class="btn btn-link btn-sm">
                             New
                        </a>
                    @endif
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($logo as $log)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$log->name}}</td>
                                    <td><img src="{{URL::asset('/img/').'/'.$log->photo}}" width="65"/></td>
                                    <td>
                                        <a href="{{url('/logo/edit/'.$log->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection