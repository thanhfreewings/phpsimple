@extends('layouts.dashboard')

@section('content')

<div class="dashboard_graph">

    <div class="row x_title">
        <div class="col-md-6">
            <h3>All Posts</h3>
        </div>
    </div>

    <div class="col-md-12">
	    <table class="table table-hover">
	        <tr class="active">
	            <th>Title</th>
	            <th><i class="fa fa-comments"></i></th>
	            <th>Created by</th>
	            <th>Created at</th>
	            <th>#Edit</th>
	            <th></th>
	            <th></th>
	        </tr>
	        @foreach($posts as $post)
	        <tr>
	            <td>{{$post->title}}</td>
	            <td>{{$post->countComment()}}</td>
	            <td>{{$post->user->name}}</td>
	            <td>{{$post->created_at}}</td>
	            <td><a href="/post/view/{{$post->id}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-arrow-right"></span> View</a></td>
	            <td><a href="/admin/post/edit/{{$post->id}}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a></td>
	            <td>
                    <form method="POST" action="/admin/post/delete/{{$post->id}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Delete</button>
                    </form>
                </td>
	        </tr>
	        @endforeach
	    </table>
    </div>

    <div class="clearfix"></div>
</div>

@endsection