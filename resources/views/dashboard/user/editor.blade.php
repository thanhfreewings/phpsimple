@extends('layouts.dashboard')

@section('content')

<div class="dashboard_graph">

	<div class="row x_title">
		<div class="col-md-6">
			<h3>Editors</h3>
		</div>
	</div>

	<div class="col-md-12">
		<div class="col-md-12">
			<table class="table table-hover">
				<tr>
					<th>Avatar</th>
					<th>Name</th>
					<th>Email</th>
					<th>Posts</th>
				</tr>
				@foreach($users as $user)
				<tr>
					<td><img src="{{$user->getAvatar()}}" height="25" width="25"></td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->countPost()}}</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>

	<div class="clearfix"></div>
</div>
@endsection