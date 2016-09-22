@extends('layouts.blog')

@section('content')
    <div class="container mtb">
        <div class="row">
            <div class="col-lg-6">
                <h4>Tài khoản</h4>
                <div class="border-item">
                    <div class="col-md-12">
                        <br>
                        <form method="POST" class="" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Email<span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control" value="{{$user->email}}" readonly>
                                <small class="pull-right text-warning">Email cannot be changed.</small>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Tên<span class="text-danger">*</span></label>
                                <input type="text" name="name" required="" class="form-control" value="{{$user->name}}">
                                @if($errors->has('name'))
                                <label class="pull-right text-danger">{{$errors->first('name')}}</label>
                                @endif
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="address" class="form-control" value="{{$user->address}}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Điện thoại</label>
                                <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <div class="clearfix"></div>
                                <img src="{{$user->getAvatar()}}" class="img-thumbnail" style="width:120px;height:120px">

                                <input type="file" name="avatar" class="form-control" style="margin-top:10px">
                                @if($errors->has('avatar'))
                                <label class="pull-right text-danger">{{$errors->first('avatar')}}</label><br>
                                @endif

                                <button type="submit" class="btn btn-success" style="margin:15px 0px 40px 0px">Lưu thay đổi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h4 id="password-area">Mật khẩu</h4>
                <div class="border-item">
                    <div class="col-md-12">
                        <br>
                        <form method="POST" action="/user/password" class="">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Mật khẩu hiện tại<span class="text-danger">*</span></label>
                                <input type="password" required="" name="old-password" class="form-control">

                                @if($errors->has('old-password'))
                                <label class="text-danger">{{$errors->first('old-password')}}</label>
                                @endif

                                @if(Session::has('error'))
                                <label class="text-danger">{{Session::get('error')}}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu mới<span class="text-danger">*</span></label>
                                <input type="password" required="" name="new-password" class="form-control">
                                @if($errors->has('new-password'))
                                <label class="text-danger">{{$errors->first('new-password')}}</label>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu mới<span class="text-danger">*</span></label>
                                <input type="password" required="" name="confirm-new-password" class="form-control">
                                @if($errors->has('confirm-new-password'))
                                <label class="text-danger">{{$errors->first('confirm-new-password')}}</label>
                                @endif
                                <br>
                                <button type="submit" class="btn btn-success" style="margin:0px 0px 40px 0px">Đổi mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection