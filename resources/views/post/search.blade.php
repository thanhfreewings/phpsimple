@extends('layouts.blog')

@section('content')
    <div class="container mtb">
        <!-- <div class="spacing"></div> -->
        <div class="row">
            <div class="col-lg-8">
                <label><a href="/">Home </a> / Tìm kiếm</label>
                <hr/>
                @if(count($posts) == 0)
                <div>
                    <p class="text-muted" style="text-align:center;margin:50px 0px">Không tìm thấy bài viết nào</p>
                </div>
                @endif
                @foreach($posts as $post)
                <div>
                    <!-- <p><img class="img-responsive" src="img/post02.jpg"></p> -->
                    <a href="/post/view/{{$post->id}}"><h3 class="ctitle">{{$post->title}}</h3></a>
                    <p><csmall>{{$post->created_at}}</csmall> | <csmall2>By: {{$post->user->name}} - {{$post->countComment()}} Comments</csmall2></p>
                    @if($post->introduction)
                    <p>{{$post->introduction}}</p>
                    @else
                    <p>{!!substr($post->content,0,250)!!}</p>
                    @endif
                    <p><a href="/post/view/{{$post->id}}" class="displayBlock">[Đọc tiếp >>]</a></p>

                    <div class="spacing"></div>
                </div>
                @endforeach
            </div>

            <div class="col-lg-4">
                @include('post.__nav_right')
            </div>
        </div>
    </div>
@endsection