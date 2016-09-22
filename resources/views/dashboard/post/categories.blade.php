@extends('layouts.dashboard')

@section('content')
<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>PHP</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form method="POST" action="/admin/post/addphp" class="form-add">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="input-group">
                    <select name="phppost" class="form-control">
                        <option value="">Choose a post...</option>
                        @foreach(\App\Models\Post::getPostToSelect($phps) as $post)
                        <option value="{{$post->id}}">{{$post->title}}</option>
                        @endforeach
                    </select>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </span>
                </div>
            </form>    
            <table class="table table-hover">
                <tr class="active">
                    <th>Title</th>
                    <th>Created by</th>
                    <th>Created at</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($phps as $php)
                <tr>
                    <td><a href="">{{$php->post->title}}</a></td>
                    <td><a href="">{{$php->post->user->name}}</a></td>
                    <td>{{$php->post->created_at}}</td>
                    <td><a href="/post/view/{{$php->post->id}}">View</a></td>
                    <td><a href="/admin/post/deletephp/{{$php->id}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="x_panel">
        <div class="x_title">
            <h2>Laravel</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form method="POST" action="/admin/post/addlaravel" class="form-add">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="input-group">
                    <select name="laravelpost" class="form-control">
                        <option value="">Choose a post...</option>
                        @foreach(\App\Models\Post::getPostToSelect($laravels) as $post)
                        <option value="{{$post->id}}">{{$post->title}}</option>
                        @endforeach
                    </select>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </span>
                </div>
            </form>
            <table class="table table-hover">
                <tr class="active">
                    <th>Title</th>
                    <th>Created by</th>
                    <th>Created at</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($laravels as $laravel)
                <tr>
                    <td><a href="">{{$laravel->post->title}}</a></td>
                    <td><a href="">{{$laravel->post->user->name}}</a></td>
                    <td>{{$laravel->post->created_at}}</td>
                    <td><a href="/post/view/{{$laravel->post->id}}">View</a></td>
                    <td><a href="/admin/post/deletelaravel/{{$laravel->id}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Bootstrap</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form method="POST" action="/admin/post/addbootstrap" class="form-add">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="input-group">
                    <select name="bootstrappost" class="form-control">
                        <option value="">Choose a post...</option>
                        @foreach(\App\Models\Post::getPostToSelect($bootstraps) as $post)
                        <option id="bootstrap{{$post->id}}" value="{{$post->id}}">{{$post->title}}</option>
                        @endforeach
                    </select>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </span>
                </div>
            </form>
            <table class="table table-hover">
                <tr class="active">
                    <th>Title</th>
                    <th>Created by</th>
                    <th>Created at</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($bootstraps as $bootstrap)
                <tr>
                    <td><a href="">{{$bootstrap->post->title}}</a></td>
                    <td><a href="">{{$bootstrap->post->user->name}}</a></td>
                    <td>{{$bootstrap->post->created_at}}</td>
                    <td><a href="/post/view/{{$bootstrap->post->id}}">View</a></td>
                    <td><a href="/admin/post/deletebootstrap/{{$bootstrap->id}}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<style type="text/css">
    .form-add{
        margin-top: -20px;
    }
</style>
@endsection