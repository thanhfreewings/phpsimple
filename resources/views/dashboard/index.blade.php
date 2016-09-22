@extends('layouts.dashboard')

@section('content')
<div class="col-md-6">
    <div class="dashboard_graph">
        <div class="row x_title">
            <div class="col-md-6">
                <h3>Recent Posts</h3>
            </div>
        </div>

        <div class="col-md-12">
            <table class="table table-hover">
                <tr class="active">
                    <th>Title</th>
                    <th>Created by</th>
                    <th>Created at</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td><a href="">{{$post->title}}</a></td>
                    <td><a href="">{{$post->user->name}}</a></td>
                    <td>{{$post->created_at}}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<div class="col-md-6">
    <div class="dashboard_graph">
        <div class="row x_title">
            <div class="col-md-6">
                <h3>Recent Users</h3>
            </div>
        </div>

        <div class="col-md-12">
            <table class="table table-hover">
                <tr class="active">
                    <th>Name</th>
                    <th>Posts Created</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td><a href=""><img src="{{$user->getAvatar()}}" height="23" width="23"> {{$user->name}}</a></td>
                    <td>{{$user->countPost()}}</td>
                </tr>
                @endforeach
            </table>
        </div>

        <div class="clearfix"></div>
    </div>
</div>

@endsection