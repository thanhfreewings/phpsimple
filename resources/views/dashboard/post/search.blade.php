@extends('layouts.dashboard')

@section('content')
    <div class="container mtb">
        <div class="row">
        
            <div class="col-lg-8">
                <h4>Kết quả tìm kiếm</h4>
                <div class="hline"></div>

                @if(count($posts) == 0)
                <p class="text-muted">Không tìm thấy bài viết nào cho "{{Session::get('keyword')}}"</p>
                @endif
                @foreach($posts as $post)
                <!-- <p><img class="img-responsive" src="img/post02.jpg"></p> -->
                <a href="/post/view/{{$post->id}}"><h3 class="ctitle">{{$post->title}}</h3></a>
                <p><csmall>{{$post->created_at}}</csmall> | <csmall2>By: {{$post->user->name}} - {{$post->countComment()}} Comments</csmall2></p>
                @if($post->introduction)
                <p>{{$post->introduction}}</p>
                @else
                <p>{!!substr($post->content,0,250)!!}</p>
                @endif
                <p><a href="/post/view/{{$post->id}}">[Read More]</a></p>
                
                <div class="spacing"></div>
                @endforeach
            </div>
            
            <div class="col-lg-4">
            @include('post.__nav_right')
            </div>
        </div>
     </div>
@endsection