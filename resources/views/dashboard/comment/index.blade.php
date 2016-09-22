@extends('layouts.dashboard')

@section('content')

<div class="dashboard_graph">

    <div class="row x_title">
        <div class="col-md-6">
            <h3>Comments</h3>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-12">
            <table class="table">
                <tr class="active">
                    <th>Title</th>
                    <th>Count comments</th>
                    <th></th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->countComment()}}</td>
                    <td><a href="/post/view/{{$post->id}}">View</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="clearfix"></div>
</div>
@endsection