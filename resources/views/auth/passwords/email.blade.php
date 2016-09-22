@extends('layouts.auth')
@section('content')

    @if (session('status'))
        <br/>
        <label class="text-success">{{ session('status') }}</label>
    @endif
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            @if ($errors->has('email'))
                <br/>
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <label class="pull-left">Nhập địa chỉ Email</label>
            <input id="email" type="email" placeholder="E-Mail Address" class="form-control" required="" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">
                <i class="fa fa-btn fa-envelope"></i> Khôi phục mật khẩu
            </button>
            <br>
            <a href="/login">Đăng nhập</a>
        </div>
    </form>
@endsection