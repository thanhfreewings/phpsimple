@extends('layouts.dashboard')

@section('content')

<div class="dashboard_graph">

	<div class="row x_title">
		<div class="col-md-6">
			@if($user->id == \Auth::user()->id)
			<h3>My profile</h3>
			@else
			<h3>View user</h3>
			@endif
		</div>
	</div>

	<div class="col-md-12">
			<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
				<div class="profile_img">
					<div id="crop-avatar">
						<!-- Current avatar -->
						<img class="img-responsive avatar-view" src="{{$user->getAvatar()}}" alt="Avatar" title="Change the avatar">
					</div>
				</div>
				<h3>{{$user->name}}</h3>

				<ul class="list-unstyled user_data">
					<li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
					</li>

					<li>
						<i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
					</li>

					<li class="m-top-xs">
						<i class="fa fa-external-link user-profile-icon"></i>
						<a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
					</li>
				</ul>
				@if($user->id == \Auth::user()->id)
				<a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
				@endif
				<br />
			</div>

			<div class="col-md-9">
				<table class="table table-hover">
					<tr>
						<th>Title</th>
						<th>Created at</th>
					</tr>
					<tr>
						<td></td>
						<td></td>
					</tr>
				</table>
			</div>
		</div>

		<div class="clearfix"></div>
	</div>
	@endsection