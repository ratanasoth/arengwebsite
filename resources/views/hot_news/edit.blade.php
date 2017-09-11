@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Edit Hot News&nbsp;&nbsp;
                    <a href="{{url('/hotnews')}}" class="btn btn-link btn-sm">Back To List</a>
                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif

                    <form 
                    	action="{{url('/hotnews/update')}}" 
                    	class="form-horizontal" 
                    	method="post"
                    	enctype="multipart/form-data"  
                    >
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id" value="{{$hotnews->id}}">
                        <div class="form-group row">
                            <label for="short_description" class="control-label col-lg-2 col-sm-2">
                            	Short Descrition <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" required autofocus name="short_description" id="short_description" class="form-control"  value="{{$hotnews->short_description}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="control-label col-lg-2 col-sm-2">Date<span class="text-danger">*</span></label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="text" name="date" id="date" class="form-control" value="{{$hotnews->date}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="control-label col-lg-2 col-sm-2">Image<span class="text-danger">*</span></label>
                            <div class="col-lg-6 col-sm-8">
                                <input type="file" name="image" id="image" accept="image/*" onchange="loadFile(event)" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="control-label col-lg-2 col-sm-2"></label>
                            <div class="col-lg-6 col-sm-8">
                                 <img src="{{URL::asset('/img/').'/'.$hotnews->photo}}" width="150"" id="img"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-2 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">Save Change</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
    function loadFile(e){
        var output = document.getElementById('img');
        output.width = 150;
        output.src = URL.createObjectURL(e.target.files[0]);
    }
</script>
@endsection