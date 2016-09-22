@extends('layouts.blog')

@section('content')
	<div class="container mtb">
		<div class="row">
			<div class="col-lg-8">
				<label><a href="/">Home </a> / Chủ đề</label>
                <hr/>
				<div class="">
					@foreach($categoryIds as $value)
					<h4><a href="/post/view/{{$value->post->id}}">{{$value->post->title}}</a></h4>
					<small class="text-muted">{{$value->post->created_at}} | Tác giả: {{$value->post->user->name}}</small>
					<hr/>
					@endforeach
				</div>
			</div>
			<div class="col-lg-4">
				@include('post.__nav_right')
			</div>
		</div>
	 </div>
@endsection