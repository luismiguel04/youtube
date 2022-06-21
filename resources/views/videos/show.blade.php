@extends('layouts.app')
@section('content')

    <p>{{$video->id}}</p>
    @if(Storage::disk('images')->has($video->image))
        <div class="video-imagen-thumb col-md-3 pull-left">
            <div class="video-image-mask">
                <img src="{{ url('/miniatura/'.$video->image) }}" class="video-image responsive">
            </div>
        </div>
    @endif
<h3>Video</h3>
    <!--video-->
    <video controls id="video-player">
        <source src="{{route('fileVideo',['filename' =>$video->video_path])}}"></source>
        Tu navegador no es compatible con HTML5
    </video>
@endsection
