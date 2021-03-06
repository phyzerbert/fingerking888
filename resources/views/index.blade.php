@extends('layouts.app')
@section('style')
    <style>
        .img-description {
            width: 100%;
        }
        .description1, .description2 {
            padding-left: 15px;
            padding-right: 15px;
            margin-top: 10px;
        }
    </style>
    <link href="{{asset('plugins/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/summernote/summernote-bs4.css')}}" rel="stylesheet"> 
@endsection
@section('content')
    @php
        $data = \App\King::all();
        $setting = \App\Setting::find(1);
        $route_name = Route::currentRouteName();
    @endphp
    <div class="container">
        <div class="row justify-content-center mt-3 mt-md-5">
            <div class="col-12" style="position: relative">
                <a href="https://api.whatsapp.com/send?phone={{$setting->whatsapp}}&text=Customer" class="logo-whatsapp" title="WhatsApp" target="_blank">
                    <img src="{{asset('/images/whatsapp.png')}}" width="40" alt="">
                    <span>{{$setting->whatsapp}}</span>
                </a>
                <a href="https://t.me/{{$setting->telegram}}" class="logo-telegram" title="Telegram" target="_blank">
                    <img src="{{asset('/images/telegram.png')}}" width="40" alt="">
                    <span>{{$setting->telegram}}</span>
                </a>
                @if($route_name == 'home')
                    <a href="javascript:;" data-toggle="modal" data-target="#settingModal" class="btn-setting-edit">
                        <img src="/images/edit.png" width="30">
                    </a>
                @endif
            </div>
            <div class="col-12">
                <div class="clearfix">
                    @if($route_name == 'home')
                        <a href="javascript:;" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#addModal">Add New</a>
                    @endif
                </div>
                @foreach ($data as $item)
                    <div class="card-king mt-2">
                        <h4 class="clearfix text-center">
                            <span class="title">{!! $item->title !!}</span>
                            @if($route_name == 'home')
                                {{-- <a href="javascript:;" class="btn btn-sm btn-info btn-edit float-right" data-id="{{$item->id}}">Edit</a> --}}
                                <a href="{{route('king.edit', $item->id)}}" class="btn btn-sm btn-info float-right" data-id="{{$item->id}}">Edit</a>
                            @endif
                        </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        @if (file_exists($item->image1))
                                            <img src="{{asset($item->image1)}}" class="img-description" alt="">
                                        @else
                                            <img src="{{asset('/images/no-image.jpg')}}" class="img-description" alt="">
                                        @endif
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        @if (file_exists($item->image2))
                                            <img src="{{asset($item->image2)}}" class="img-description" alt="">
                                        @else
                                            <img src="{{asset('/images/no-image.jpg')}}" class="img-description" alt="">
                                        @endif
                                    </div>
                                    <p class="description1">{!!$item->description1!!}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        @if (file_exists($item->image3))
                                            <img src="{{asset($item->image3)}}" class="img-description" alt="">
                                        @else
                                            <img src="{{asset('/images/no-image.jpg')}}" class="img-description" alt="">
                                        @endif
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        @if (file_exists($item->image4))
                                            <img src="{{asset($item->image4)}}" class="img-description" alt="">
                                        @else
                                            <img src="{{asset('/images/no-image.jpg')}}" class="img-description" alt="">
                                        @endif
                                    </div>
                                    <p class="description2">{!!$item->description2!!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @if($route_name == 'home') 
        <div class="modal fade" id="addModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <form action="{{route('king.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Title</label>
                                <textarea name="title" rows="2" class="form-control summernote"></textarea>
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
                                <textarea name="description1" rows="2" class="form-control description1 summernote"></textarea>
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
                                <textarea name="description2" rows="2" class="form-control description2 summernote"></textarea>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
                        </div>                
                    </form>          
                </div>
            </div>
        </div>

        <div class="modal fade" id="settingModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Setting</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <form action="{{route('setting.update')}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Whatsapp</label>
                                <input type="text" class="form-control whatsapp" name="whatsapp" value="{{$setting->whatsapp}}" required />
                            </div>  
                            <div class="form-group">
                                <label for="">Telegram</label>
                                <input type="text" class="form-control telegram" name="telegram" value="{{$setting->telegram}}" required />
                            </div>                       
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger ml-2" data-dismiss="modal">Close</button>
                        </div>                
                    </form>          
                </div>
            </div>
        </div>
    @endif
@endsection
@section('script')
    <script src="{{asset('plugins/summernote/summernote.min.js')}}"></script>
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            $(".summernote").summernote();
        })
    </script>
@endsection