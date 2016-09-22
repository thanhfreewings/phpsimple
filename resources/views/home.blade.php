@extends('layouts.blog')

@section('content')
<style type="text/css">
    .imgPost{
        margin: 10px 0px;
    }
</style>
<div class="container mtb">
    <div class="row">
        <div class="col-lg-8">
            <label>Home</label>
            <hr/>
            @foreach($posts as $post)
            <div class="">
                <a href="/post/view/{{$post->id}}"><h3 class="ctitle">{{$post->title}}</h3></a>
                <p><csmall2>Tác giả: <a href="javascript:;" style="color:#f39c12">{{$post->user->name}}</a> - {{$post->countComment()}} Comments</csmall2> | <csmall>{{$post->created_at}}</csmall></p>
                @if($post->introduction)
                <p>{{$post->introduction}}</p>
                @else
                <p>{!!substr($post->content,0,250)!!}</p>
                @endif
                <p><a href="/post/view/{{$post->id}}" class="displayBlock">[Đọc tiếp >>]</a></p>
            </div>
            <hr/>
            @endforeach
            {{ $posts->links() }}
        </div>
        <div class="col-lg-4">
            @include('post.__nav_right')
        </div>
    </div>
</div>
@endsection