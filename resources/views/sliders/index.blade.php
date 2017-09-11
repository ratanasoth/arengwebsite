@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Slider List&nbsp;&nbsp;
                    <a href="{{url('/slider/create')}}" class="btn btn-link btn-sm">New</a>
                </div>
                <div class="card-block">

                    <table class="tbl">
                        <thead>
                            <tr>
                                <th>&numero;</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Order &numero;</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=1)
                            @foreach($sliders as $sli)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$sli->name}}</td>
                                    <td><img src="{{URL::asset('/img/').'/'.$sli->photo}}" width="65"/></td>
                                    <td>{{$sli->description}}</td>
                                    <td>{{$sli->order_number}}</td>
                                    <td>
                                        <a href="{{url('/slider/edit/'.$sli->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp;
                                        <a href="{{url('/slider/delete/'.$sli->id)}}" onclick="return confirm('Do you want to delete?')" title="Delete"><i class="fa fa-remove text-danger"></i></a>
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
