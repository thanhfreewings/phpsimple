@extends('layouts.auth')
@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="pull-left control-label">Địa chỉ E-Mail</label>

        <div class="">
            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

            @if ($errors->has('email'))
                <span class="help-block pull-left">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                <br/>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="pull-left">Mật khẩu mới</label>

        <div class="">
            <input id="password" type="password" class="form-control" name="password">

            @if ($errors->has('password'))
                <span class="help-block pull-left">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                <br/>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label class="pull-left control-label">Nhập lại mật khẩu</label>
        <div class="">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

            @if ($errors->has('password_confirmation'))
                <span class="help-block pull-left">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                <br/>
            @endif
        </div>
    </div>

    <div class="">
        <button type="submit" class="btn btn-primary btn-block">
            <i class="fa fa-btn fa-refresh"></i> Đặt lại mật khẩu
        </button>
        <br>
        <a href="/login">Đăng nhập</a>
    </div>
</form>
@endsection
