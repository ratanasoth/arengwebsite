@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> View Page&nbsp;&nbsp;
                    <a href="{{url('/page')}}" class="btn btn-link btn-sm">Back To List</a>
                </div>
                <div class="card-block">
                    <form 
                    >
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="title" class="control-label col-lg-12 col-sm-12">
                            	<p class="text-primary">Title</p>
                                <p>{{$page->title}}</p>
                            </label>
                        </div>
                        <div class="form-group row">
                            <label for="short_description" class="control-label col-lg-12 col-sm-12">
                                <p class="text-primary">Short Description</p>
                                <p>{{$page->short_description}}</p>
                            </label>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="control-label col-lg-12 col-sm-12">
                                <p class="text-primary">Description</p>
                                <p>{!!$page->description!!}</p>
                            </label>
                        </div>       
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection