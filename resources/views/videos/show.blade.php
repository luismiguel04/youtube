@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card text-center">
        <div class="card-header">
            Mini Yuotube
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$video->title}}</h5>
    <video controls id="video-player" width="100%">
        <source src="{{route('fileVideo',['filename' =>$video->video_path])}}"></source>
        Tu navegador no es compatible con HTML5
    </video>
            <p class="card-text">{{$video->description}}</p>
            <a href="{{ route('videos.index') }}" class="btn btn-primary">Regresar</a>
        </div>
        <div class="card-footer text-muted">
            Publicado por: {{$video->name}} | fecha: {{ LongTimeFilter( $video->created_at)}}
        </div>
    </div>
{{--    <h1>{{$video->title}}</h1>--}}
 {{--   @if(Storage::disk('images')->has($video->image))
        <div class="video-imagen-thumb col-md-3 pull-left">
            <div class="video-image-mask">
                <img src="{{ url('/miniatura/'.$video->image) }}" class="video-image responsive">
            </div>
        </div>
    @endif--}}
    <!--video-->
{{--    <h5>{{$video->description}}</h5>--}}
    <hr/>
    <h3>Realiza un comentario </h3>
    @if(Auth::check())
        <form class="col-md-4" method="post" action="{{route('comentarios.store')}}">
            {!! csrf_field() !!}
            <input type="hidden" name="video_id" value="{{$video->id}}" required>
            <p>
           <textarea class="form-control" name="body" required>

           </textarea>
            </p>
            <input type="submit" value="Comentar" class="btn btn-success">

        </form>
        <div class="clearfix"></div>
        <hr/>
    @endif
    
    <h4>Comentarios</h4>
        <div id="comments-list">
            @foreach($comments as $comment)
                <div class="comment-item col-md-12 pull-left">
                    <div class="panel panel-default comment-data">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <strong>{{($comment->name)}}</strong>  {{ LongTimeFilter( $comment->created_at)}}
                            </div>
                        </div>
                        <div class="panel-body">
                            {{$comment->body}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


</div>
@endsection
