@extends('layouts.dashboard')

@section('content')
 <div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit post</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <form method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Title*</label>
                        <input type="text" name="title" class="form-control" value="{{$post->title}}"></input>
                        @if($errors->has('title'))
                            <label class="text-danger">{{$errors->first('title')}}</label>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Introduction</label>
                        <textarea name="introduction" class="form-control" rows="3">{{$post->introduction}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Attachment</label>
                        <input type="file" name="attachment" class="form-control"></input>
                        <br>
                        @if($post->attachment)
                        <input type="checkbox" name="deleteAttachment"> Delete attachment: <a href="javascript:;" download>{{substr($post->attachment,11)}}</a>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Content*</label>
                        <textarea name="content" class="ckeditor">{!! $post->content !!}</textarea>
                        @if($errors->has('content'))
                            <label class="text-danger">{{$errors->first('content')}}</label>
                        @endif
                        <br>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="" class="btn btn-white">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
