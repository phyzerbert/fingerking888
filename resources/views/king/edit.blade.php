@extends('layouts.app')
@section('style')    
    <link href="{{asset('plugins/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/summernote/summernote-bs4.css')}}" rel="stylesheet"> 
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Edit</h3></div>
                    <div class="card-body">
                        <form action="{{route('king.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" class="id" value="{{$king->id}}">
                            <div class="form-group">
                                <label for="">Title</label>
                                <textarea name="title" rows="1" class="form-control summernote" placeholder="Title">{{$king->title}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Image1</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image1" id="customFile1">
                                    <label class="custom-file-label" for="customFile1">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Image2</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image2" id="customFile2">
                                    <label class="custom-file-label" for="customFile2">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Description1</label>
                                <textarea name="description1" rows="2" class="form-control description1 summernote" id="description1">{{$king->description1}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Image3</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image3" id="customFile3">
                                    <label class="custom-file-label" for="customFile3">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Image4</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image4" id="customFile4">
                                    <label class="custom-file-label" for="customFile4">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Description2</label>
                                <textarea name="description2" rows="2" class="form-control description2 summernote" id="description2">{{$king->description2}}</textarea>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('plugins/summernote/summernote.min.js')}}"></script>
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(document).ready(function () {  
            $(".summernote").summernote();
        });
    </script>
@endsection