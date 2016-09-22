@extends('layouts.dashboard')

@section('content')

<div class="dashboard_graph">

    <div class="row x_title">
        <div class="col-md-6">
            <h3>All users</h3>
        </div>
    </div>

    <div class="col-md-12">
		<table class="table">
		    <tr class="active">
		        <th>Name</th>
		        <th>Email</th>
		        <th>Role</th>
		        <th></th>
		    </tr>
		    @foreach($users as $user)
		    <tr>
		        <td>{{$user->name}}</td>
		        <td>{{$user->email}}</td>
		        <td>
		        	<form method="POST" id="form{{$user->id}}" action="/admin/user/role/{{$user->id}}">
		        		<input type="hidden" name="_token" value="{{csrf_token()}}">
		        		@if(\Auth::user()->role_id == 1)
						<select name="role_id" class="form-control input-sm" onchange="autoSubmitForm{{$user->id}}()">
							@if($user->role_id == 1)
							<option value="1" selected>Admin</option>
							<option value="2">Editor</option>
							<option value="3">User</option>
							@elseif($user->role_id == 2)
							<option value="1">Admin</option>
							<option value="2" selected>Editor</option>
							<option value="3">User</option>
							@else
							<option value="1">Admin</option>
							<option value="2">Editor</option>
							<option value="3" selected>User</option>
							@endif
						</select>
						@else
						<select name="role_id" disabled="" class="form-control input-sm" onchange="autoSubmitForm{{$user->id}}()">
							@if($user->role_id == 1)
							<option value="1">Admin</option>
							@elseif($user->role_id == 2)
							<option value="2">Editor</option>
							@else
							<option value="3">User</option>
							@endif
						</select>
						@endif
		        	</form>
		        </td>
		        <td><a href="/admin/user/view/{{$user->id}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-arrow-right"></span> View</a></td>
		    </tr>
			<script type="text/javascript">
				function autoSubmitForm{{$user->id}}() {
					$('#form{{$user->id}}').submit();
				}
			</script>
		    @endforeach
		</table>
    </div>

    <div class="clearfix"></div>
</div>
@endsection