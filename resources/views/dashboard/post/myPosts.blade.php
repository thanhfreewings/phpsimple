@extends('layouts.dashboard')

@section('content')
 <div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>My posts</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <div class="col-lg-12">
                <table class="table table-hover">
                    <tr class="active">
                        <th>Title</th>
                        <th>Created at</th>
                        <th><i class="fa fa-comments"></i></th>
                        <th>#Edit</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->countComment()}}</td>
                        <td><a href="/post/view/{{$post->id}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-arrow-right"></span> View</a></td>
                        <td><a href="/admin/post/edit/{{$post->id}}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a></td>
                        <td><a href="/admin/post/delete/{{$post->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash-o"></i> Delete</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
