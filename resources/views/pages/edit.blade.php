@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Edit Page&nbsp;&nbsp;
                    <a href="{{url('/page')}}" class="btn btn-link btn-sm">Back To List</a>
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
                    	action="{{url('/page/update')}}" 
                    	class="form-horizontal" 
                    	method="post"
                    >
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id" value="{{$page->id}}">
                        <div class="form-group row">
                            <label for="title" class="control-label col-lg-1 col-sm-2">
                            	Title <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input 
                                    type="text" 
                                    required 
                                    autofocus 
                                    name="title" 
                                    id="title" 
                                    class="form-control"
                                    value="{{$page->title}}"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="short_description" class="control-label col-lg-1 col-sm-2">
                                Short Description
                            </label>
                            <div class="col-lg-6 col-sm-8">
                                <input 
                                    type="text" 
                                    name="short_description" 
                                    id="short_description" 
                                    class="form-control"
                                    value="{{$page->short_description}}"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="control-label col-lg-1 col-sm-2">
                                Description
                            </label>
                            <div class="col-lg-11 col-sm-10">
                                <textarea name="description" id="description" rows="6" class="form-control ckeditor">
                                    {{$page->description}}
                                </textarea>
                            </div>
                        </div>    
                        <div class="form-group row">
                            <label class="control-label col-lg-1 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-8">
                                <button class="btn btn-primary" type="submit">Save Change</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
         CKEDITOR.replace( 'description',
         {
          customConfig : 'config.js',
          toolbar : 'simple'
          })
</script> 
<script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
@endsection