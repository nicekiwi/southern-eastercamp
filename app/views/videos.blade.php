@extends('layouts.master')

@section('title','Videos')
@section('desc','')

@section('content')


    <div class="row">
        <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-4">

        @foreach ($videos as $video)
            <li><a class="fancybox" href="http://www.youtube.com/watch?v={{ $video->url }}"><img class="th" src="http://i.ytimg.com/vi/{{ $video->url }}/hqdefault.jpg"></a></li>
        @endforeach

        </ul>
    </div>  

    
@stop