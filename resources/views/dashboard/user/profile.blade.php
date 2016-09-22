@extends('layouts.dashboard')

@section('content')
<div class="col-md-12">
	<h3>Edit profile</h3>
</div>
<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Infomations</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form method="POST" action="/user/profile" class="form-horizontal" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>Email<span class="text-danger">*</span></label>
                    <input type="text" name="email" class="form-control" value="{{$user->email}}" readonly>
                    <small class="pull-right text-warning">Email cannot be changed.</small>
                </div>
                <br>
                <div class="form-group">
                    <label>Name<span class="text-danger">*</span></label>
                    <input type="text" name="name" required="" class="form-control" value="{{$user->name}}">
                    @if($errors->has('name'))
                    <label class="pull-right text-danger">{{$errors->first('name')}}</label>
                    @endif
                </div>
                <br>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" value="{{$user->address}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                </div>
                <br>
                <div class="form-group">
                    <label>Avatar</label>
                    <div class="clearfix"></div>
                    <img src="{{$user->getAvatar()}}" class="img-thumbnail" style="width:120px;height:120px">

                    <input type="file" name="avatar" class="form-control" style="margin-top:10px">
                    @if($errors->has('avatar'))
                    <label class="pull-right text-danger">{{$errors->first('avatar')}}</label><br>
                    @endif

                    <button type="submit" class="btn btn-success" style="margin:15px 0px 40px 0px">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Password</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form method="POST" action="/user/password" class="form-horizontal">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>Old Password<span class="text-danger">*</span></label>
                    <input type="password" required="" name="old-password" class="form-control" placeholder="Old Password">

                    @if($errors->has('old-password'))
                    <label class="text-danger">{{$errors->first('old-password')}}</label>
                    @endif

                    @if(Session::has('error'))
                    <label class="text-danger">{{Session::get('error')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>New Password<span class="text-danger">*</span></label>
                    <input type="password" required="" name="new-password" class="form-control" placeholder="New Password">
                    @if($errors->has('new-password'))
                    <label class="text-danger">{{$errors->first('new-password')}}</label>
                    @endif
                </div>
                <div class="form-group">
                    <label>Confirm New Password<span class="text-danger">*</span></label>
                    <input type="password" required="" name="confirm-new-password" class="form-control" placeholder="Confirm New Password">
                    @if($errors->has('confirm-new-password'))
                    <label class="text-danger">{{$errors->first('confirm-new-password')}}</label>
                    @endif
                    <br>
                    <button type="submit" class="btn btn-success" style="margin:0px 0px 40px 0px">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        alert('fsda');
    });
    function success(){
        new PNotify({
            title: 'Success',
            text: 'Update profile successfuly',
            type: 'success',
            styling: 'bootstrap3'
        });
    }
    function error(){
        new PNotify({
            title: 'Error!',
            text: 'Update profile error',
            type: 'error',
            styling: 'bootstrap3'
        });
    }
</script>
@endsection