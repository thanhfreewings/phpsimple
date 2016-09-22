@extends('layouts.auth')
@section('content')
<form role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="pull-left">Tên</label>
        <input type="text" name="name" class="form-control" placeholder="Tên" required="" value="{{ old('name') }}"/>
        @if ($errors->has('name'))
            <span class="help-block pull-left">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            <br>
        @endif
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label class="pull-left">Địa chỉ Email</label>
        <small class="text-warning">(vui lòng nhập đúng Email để kích hoạt tài khoản)</small>
        <input type="email" name="email" class="form-control" placeholder="Email" required="" value="{{ old('email') }}" />
        @if ($errors->has('email'))
            <span class="help-block pull-left">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            <br>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="pull-left">Mật khẩu</label>
        <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required="" value="{{ old('password') }}"/>
        @if ($errors->has('password'))
            <span class="help-block pull-left">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            <br>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label class="pull-left">Nhập lại mật khẩu</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu" required="" />
        @if ($errors->has('password_confirmation'))
            <span class="help-block pull-left">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
            <br>
        @endif
    </div>
    <div>
        <button type="submit" class="btn btn-default">Đăng ký</button>
    </div>

    <div class="clearfix"></div>

    <div class="separator">
        <p class="change_link">Bạn có tài khoản?
            <a href="login" class="to_register"> Đăng nhập </a>
        </p>

        <div class="clearfix"></div>
    </div>
</form>
@endsection