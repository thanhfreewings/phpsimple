@extends('layouts.auth')
@section('content')
<form role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        @if ($errors->has('email'))
            <br/>
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <label class="pull-left">Địa chỉ Email</label>
        <input type="text" name="email" class="form-control" placeholder="Email" required="" value="{{ old('email') }}"/>
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
    <div>
        <button type="submit" class="btn btn-default btn-submit" onclick="submitLoading()">Đăng nhập</button>
        <button type="button" class="btn btn-default btn-loading hidden">Loading <img src="/img/Loading.png" id="img-loading" width="15" height="15"></button>
        <a class="reset_pass" href="{{ url('/password/reset') }}">Quên mật khẩu?</a>
    </div>

    <div class="clearfix"></div>

    <div class="separator">
        <br>
        <p class="change_link">Đăng nhập bằng
            <a href="/facebook" class="btn btn-primary" style="margin-top:-3px"> Facebook </a>
        </p>
        <p class="change_link">Chưa có tài khoản?
            <a href="register" class="to_register"> Đăng ký </a>
        </p>

        <div class="clearfix"></div>
    </div>
</form>
<script type="text/javascript">
    function submitLoading() {
        $('.btn-submit').addClass('hidden');
        $('.btn-loading').removeClass('hidden');
    }
</script>
@endsection
