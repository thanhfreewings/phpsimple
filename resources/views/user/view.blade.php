@extends('layouts.blog')

@section('content')
    <div class="container mtb">
        <div class="row">
            <div class="col-lg-8">
                <h4>Bài viết của {{$user->name}}</h4>
                <div class="hline"></div>
                <div class="spacing"></div>
                @if(count($user->posts) == 0)
                <p>không có bài viết nào</p>
                @endif

                @foreach($user->posts as $post)
                <a href="/post/view/{{$post->id}}"><h3 class="ctitle">{{$post->title}}</h3></a>
                <p><csmall>{{$post->created_at}}</csmall> | <csmall2>By: {{$post->user->name}} - {{$post->countComment()}} Comments</csmall2></p>
                @if($post->introduction)
                <p>{{$post->introduction}}</p>
                @else
                <p>{!!substr($post->content,0,250)!!}</p>
                @endif
                <p><a href="/post/view/{{$post->id}}">[Read More]</a></p>

                <div class="spacing"></div>
                <hr/>
                @endforeach
            </div>
            <div class="col-lg-4">
                <h4 id="password-area">Tác giả</h4>
                <div class="hline"></div>
                <div class="spacing"></div>
                <img src="{{$user->getAvatar()}}" style="height:150px;width:auto">
                <p><b>Tên:</b> {{$user->name}}</p>
                <p><b>Email:</b> {{$user->email}}</p>
                <p><b>Địa chỉ:</b> {{$user->address}}</p>
                <p><b>Điện thoại:</b> {{$user->phone}}</p>
                <p>
                    <b>Vai trò:</b>
                    @if($user->role_id == 1)
                    Admin
                    @elseif($user->role_id == 2)
                    Editor
                    @else
                    User
                    @endif
                </p>
                <p><b>Bài đã viết:</b> {{$user->countPost()}}</p>
            </div>
        </div>
    </div>
@endsection