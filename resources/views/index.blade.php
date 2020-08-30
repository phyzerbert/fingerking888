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
@endsection
@section('content')
@php
    $data = \App\King::all();
    $setting = \App\Setting::find(1);
@endphp
<div class="container">
    <div class="row justify-content-center mt-3 mt-md-5">
        <div class="col-12">
            <a href="https://api.whatsapp.com/send?phone={{$setting->whatsapp}}&text=Customer" class="logo-whatsapp" title="WhatsApp" target="_blank">
                <img src="{{asset('/images/whatsapp.png')}}" width="40" alt="">
                <span>{{$setting->whatsapp}}</span>
            </a>
            <a href="https://t.me/{{$setting->telegram}}" class="logo-telegram" title="Telegram" target="_blank">
                <img src="{{asset('/images/telegram.png')}}" width="40" alt="">
                <span>{{$setting->telegram}}</span>
            </a>
        </div>
        <div class="col-12">
            <div class="clearfix">
                @auth                    
                    <a href="javascript:;" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#addModal">Add New</a>
                @endauth
            </div>
            @foreach ($data as $item)
                <div class="card-king mt-2">
                    <h4 class="clearfix text-center">
                        <span class="title">{{$item->title}}</span>
                        @auth
                            <a href="javascript:;" class="btn btn-sm btn-info btn-edit float-right" data-id="{{$item->id}}">Edit</a>
                        @endauth
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
                                <p class="description1">{{$item->description1}}</p>
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
                                <p class="description2">{{$item->description2}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@auth    
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
                            <input type="text" class="form-control title" name="title" required placeholder="Title" />
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
                            <textarea name="description1" rows="2" class="form-control description1"></textarea>
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
                            <textarea name="description2" rows="2" class="form-control description2"></textarea>
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

    <div class="modal fade" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <form action="{{route('king.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" class="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control title" name="title" required placeholder="Title" />
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
                            <textarea name="description1" rows="2" class="form-control description1"></textarea>
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
                            <textarea name="description2" rows="2" class="form-control description2"></textarea>
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
@endauth
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
            $(".btn-edit").click(function () {
                let id = $(this).data('id');
                let item = $(this).parents('.card-king');
                let title = item.find('.title').text();
                let description1 = item.find('.description1').text();
                let description2 = item.find('.description2').text();

                $("#editModal .id").val(id);
                $("#editModal .title").val(title);
                $("#editModal .description1").val(description1);
                $("#editModal .description2").val(description2);
                $("#editModal").modal();
            })
        })
    </script>
@endsection