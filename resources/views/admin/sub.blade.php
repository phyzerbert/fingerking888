@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">            
            <div class="clearfix">
                <h4 class="float-left">Sub Url Page</h4>
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">Add New</button>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th style="width: 50px;">Index</th>
                            <th>Title</th>
                            <th>Countdown</th>
                            <th>Redirect URL</th>
                            <th>Image</th>
                            <th style="width: 180px;">Action</th>
                        </tr>
                    </tbody>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td class="id">{{$item->id}}</td>
                                <td class="title">{{$item->title}}</td>
                                <td class="count">{{$item->count}}</td>
                                <td class="url">{{$item->url}}</td>
                                <td>
                                    <a href="javascript:;" class="btn-image">
                                        <img src="{{asset($item->image)}}" alt="" width="30" height="30" />
                                    </a>
                                </td>
                                <td class="py-2">
                                    <button class="btn btn-primary btn-edit" data-id="{{$item->id}}">Edit</button>
                                    <a href="{{route('sub_page.delete', $item->id)}}" class="btn btn-danger btn-delete" onclick="return window.confirm('Are you sure?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach                        
                    </tbody>
                </table>
                <div class="clearfix mt-2">
                    <div class="float-left" style="margin: 0;">
                        <p>Total <strong style="color: red">{{ $data->total() }}</strong> Pages</p>
                    </div>
                    <div class="float-right" style="margin: 0;">
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add New URL</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <form action="{{route('sub_page.save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Redirect URL</label>
                        <input type="text" class="form-control" name="url" required placeholder="Redirect URL" />
                    </div>
                    <div class="form-group">
                        <label for="">Title Text</label>
                        <input type="text" class="form-control" name="title" required placeholder="Title Text" />
                    </div>
                    <div class="form-group">
                        <label for="">Count Down</label>
                        <input type="number" class="form-control" name="count" min="1" required placeholder="Count Down" />
                    </div>                    
                    <div class="form-group">
                        <label for="">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
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
                <h4 class="modal-title">Add New URL</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <form action="{{route('sub_page.update')}}" method="post" enctype="multipart/form-data" id="edit_form">
                @csrf
                <input type="hidden" name="id" class="id" />
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Redirect URL</label>
                        <input type="text" class="form-control url" name="url" required placeholder="Redirect URL" />
                    </div>
                    <div class="form-group">
                        <label for="">Title Text</label>
                        <input type="text" class="form-control title" name="title" required placeholder="Title Text" />
                    </div>
                    <div class="form-group">
                        <label for="">Count Down</label>
                        <input type="number" class="form-control count" name="count" min="1" required placeholder="Count Down" />
                    </div>                    
                    <div class="form-group">
                        <label for="">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
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
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(".btn-edit").click(function(){
                let id = $(this).data('id');
                let title = $(this).parents('tr').find('.title').text();
                let url = $(this).parents('tr').find('.url').text();
                let count = $(this).parents('tr').find('.count').text();

                $("#edit_form .id").val(id);
                $("#edit_form .title").val(title);
                $("#edit_form .count").val(count);
                $("#edit_form .url").val(url);

                $("#editModal").modal('show');
            });
        });

    </script>
@endsection