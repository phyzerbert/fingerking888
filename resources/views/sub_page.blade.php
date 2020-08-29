@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header clearfix">
                    <h4 class="float-left">{{$item->title}}</h4>
                    <div class="countdown float-right">
                        <h2 id="count_digit">{{$item->count}}</h2>
                    </div>
                </div>
                <div class="card-body">
                    <img src="{{asset($item->image)}}" alt="" width="100%" />
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var countdown = {!! $item->count !!};
            var redirect_url = "{{ $item->url }}";
            console.log(countdown);
            var x = setInterval(function(){
                countdown --;
                $("#count_digit").text(countdown);
                if(countdown == 0){
                    clearInterval(x);
                    window.location.href = redirect_url;
                }
            }, 1000);
        });

    </script>
@endsection