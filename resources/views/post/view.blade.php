@extends('layouts.blog')

@section('content')
<style type="text/css">
	img.img-content{
		display: block;
		margin: 0 auto;
	}
	.popular-posts img{
		height: 46px;
		width: 46px;
	}
	.content{
		margin:-10px 0px 0px 65px;
	}
	.content2{
		margin: -10px 0px 0px 65px;
	}
	.comment2{
		margin-left: 65px;
	}
	.form-comment textarea{
		margin: 20px 0px 5px 0px;
	}
	.text-underline{
		text-decoration:underline !important;
	}
	.list-edit{
		margin-bottom:-47px !important;
	}
	.list-edit a{
		color: #fff !important;
	}
	.list-edit a:hover{
		color: #000 !important;
	}
</style>
<div class="container mtb">
	<div class="row">
		<div class="col-lg-8">
			<div class="">
				<label><a href="/">Home </a> / Bài viết</label>
                <hr/>
				<h3 class="ctitle">{{$post->title}}</h3>
				<p>
					<csmall2>Tác giả: <a href="javascript:;" style="color:#f39c12">{{$post->user->name}}</a> - {{$post->countComment()}} Bình luận</csmall2> |
					<csmall>{{$post->created_at}}</csmall>
					@if(Auth::user())
					@if($post->created_by == \Auth::user()->id)
					 |
					<csmall>
						<a href="/admin/post/edit/{{$post->id}}" class="text-muted">Sửa</a> -
						<a href="javascript:document.getElementById('deletePost').submit();" class="text-muted" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa bài</a>
						<form method="POST" id="deletePost" action="/admin/post/delete/{{$post->id}}">
							<input type="hidden" name="_token" value="{{csrf_token()}}">
						</form>
					</csmall>
					@endif
					@endif
				</p>
				<p class="share">
					<g:plusone size="medium"></g:plusone>
					<div class="fb-share-button" data-href="http://phpsimple.netne.net/post/view/{{$post->id}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocal.phpsimple%3A8080%2Fpost%2Fview%2F15&amp;src=sdkpreparse">Chia sẻ</a></div>
				</p>
				<p>{!!$post->content!!}</p>
				<div class="spacing"></div>
				@if($post->attachment)
				<b>Tệp đính kèm:</b>
				<a href="{{$post->attachment}}" download=""> {{substr($post->attachment,20)}}</a>
				<br/>
				@endif
				<p>Chia sẻ:</p>
				<p class="share">
					<g:plusone size="medium"></g:plusone>
					<div class="fb-share-button" data-href="http://phpsimple.netne.net/post/view/{{$post->id}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocal.phpsimple%3A8080%2Fpost%2Fview%2F15&amp;src=sdkpreparse">Chia sẻ</a></div>
				</p>
				<div class="spacing"></div>
				<h4>BÌNH LUẬN</h4>
				<div class="hline"></div>
				<div class="spacing"></div>
				<form role="form" method="POST" class="form-horizontal" action="/comment/create/{{$post->id}}">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="hidden" name="parent_id" value="">
					@if (Auth::guest())
					<div class="form-group">
						<div class="col-md-6">
							<label>Name</label>
							<input type="text" name="name" required="" class="form-control btn-rectangle">
						</div>
						<div class="col-md-6">
							<label>Email</label>
							<input type="email" name="email" required="" class="form-control btn-rectangle">
						</div>
					</div>
					@else
					<input type="hidden" name="email" value="">
					@endif
					<div class="form-group">
						<div class="col-md-12">
							<div class="border-item">
								<textarea name="content" class="form-control ckeditor" required="" rows="5">{!! old('content') !!}</textarea>
							</div>
							<br/>
							<button type="submit" class="btn btn-theme btn-rectangle pull-right">Đăng bình luận</button>
						</div>
					</div>
				</form>
				<br/>
				<div class="spacing"></div>
				<ul class="popular-posts">
					<hr/>
					@foreach($comments as $comment)
					@if($comment->parent_id == null)
		            <li>
	                	<a href="#"><img src="{{$comment->user->getAvatar()}}"></a>
	            		<h4>
	            			<a href="">{{$comment->user->name}}</a>
	            			@if(Auth::user())
		                	@if($comment->created_by == \Auth::user()->id)
							<small class="dropdown pull-right">
								<a href="javascript:;" class="dropdown-toggle" title="Edit or Delete" data-toggle="dropdown"><i class="fa fa-pencil text-muted"></i></a>
								<ul class="dropdown-menu">
									<li class="list-edit"><a href="javascript:;" onclick="showFormEdit{{$comment->id}}()">Sửa</a></li>
									<li class="list-edit"><a href="/comment/delete/{{$comment->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa bình luận</a></li>
								</ul>
							</small>
							@endif
							@endif
						</h4>

	            		<div class="content">
		            		<em>{{$comment->created_at}}</em>
			                <div>{!! $comment->content !!}</div>
				            <div style="margin:10px 0px">
				                <a href="javascript:;" id="btnShow{{$comment->id}}" class="text-underline" onclick="showFormReply{{$comment->id}}()">Trả lời</a>
								<a href="javascript:;" id="btnHide{{$comment->id}}" class="text-underline hidden" onclick="hideFormReply{{$comment->id}}()">Hủy</a>
							</div>
							<!-- begin form comment -->
			                <form action="/comment/create/{{$post->id}}" method="POST" id="formReply{{$comment->id}}" class="form-comment form-horizontal hidden">
		                		<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input type="hidden" name="parent_id" value="{{$comment->id}}">
								@if (Auth::guest())
			                	<div class="form-group">
			                		<div class="col-md-6">
			                			<label>Name</label>
			                			<input type="text" name="name" required="" class="form-control btn-rectangle">
			                		</div>
			                		<div class="col-md-6">
			                			<label>Email</label>
			                			<input type="email" name="email" required="" class="form-control btn-rectangle">
			                		</div>
			                	</div>
				                @else
				                <input type="hidden" name="email" value="">
								@endif
			                	<div class="form-group">
			                		<div class="col-md-12">
				                		<div class="border-item">
											<textarea name="content" required="" class="form-control ckeditor" rows="4"></textarea>
										</div>
										<br/>
										<button type="submit" class="btn btn-sm btn-theme btn-rectangle pull-right">Đăng bình luận</button>
									</div>
								</div>
								<div class="spacing"></div>
			                </form>
			                <!-- end form comment -->
			                <!-- begin form edit level 1-->
			                <form action="/comment/edit/{{$comment->id}}" method="POST" id="formEdit{{$comment->id}}" class="form-comment form-horizontal" style="display:none">
		                		<input type="hidden" name="_token" value="{{csrf_token()}}">
			                	<div class="form-group">
				                	<div class="col-md-12">
					                	<div class="border-item">
											<textarea name="content" required="" class="form-control ckeditor" rows="4">{!! $comment->content !!}</textarea>
										</div>
										<br/>
										<button type="submit" class="btn btn-sm btn-rectangle btn-theme pull-right">Sửa bình luận</button>
										<a href="javascript:;" class="btn btn-rectangle pull-right" onclick="hideFormEdit{{$comment->id}}()" class="btn">Hủy</a>
									</div>
								</div>
								<br/>
			                </form>
			                <!-- end form edit level 1 -->
		                </div>
		                <div class="comment2">
			                <ul class="popular-posts">
								@foreach($comments as $cmt)
								@if($cmt->parent_id == $comment->id)
								<hr/>
					            <li>
					                <a href="javascript:;"><img src="{{$cmt->user->getAvatar()}}"></a>
				            		<h4>
					            		<a href="javascript:;">{{$cmt->user->name}}</a>
					            		@if(\Auth::user())
										@if($cmt->created_by == \Auth::user()->id)
										<small class="dropdown pull-right">
											<a href="javascript:;" class="dropdown-toggle" title="Edit or Delete" data-toggle="dropdown"><i class="fa fa-pencil text-muted"></i></a>
											<ul class="dropdown-menu">
												<li class="list-edit"><a href="javascript:;" onclick="showFormEdit{{$cmt->id}}()">Sửa</a></li>
												<li class="list-edit"><a href="/comment/delete/{{$cmt->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa bình luận</a></li>
											</ul>
										</small>
										@endif
										@endif
				            		</h4>

					                <div class="content2">
										<em>{{$cmt->created_at}}</em>
						                <div>{!! $cmt->content !!}</div>
					                </div>
					                <!-- begin form edit level 2-->
					                <form action="/comment/edit/{{$cmt->id}}" method="POST" id="formEdit{{$cmt->id}}" class="content form-comment form-horizontal" style="display:none">
				                		<input type="hidden" name="_token" value="{{csrf_token()}}">
					                	<div class="form-group">
						                	<div class="col-md-12">
						                		<br/>
							                	<div class="border-item">
													<textarea name="content" required="" class="form-control ckeditor" rows="4">{!! $cmt->content !!}</textarea>
												</div>
												<br/>
												<button type="submit" class="btn btn-sm btn-rectangle btn-theme pull-right">Sửa bình luận</button>
												<a href="javascript:;" onclick="hideFormEdit{{$cmt->id}}()" class="btn btn-rectangle pull-right">Hủy</a>
											</div>
										</div>
										<br/>
					                </form>
					                <!-- end form edit level 2 -->
					            </li>
					            <script type="text/javascript">
					            	function showFormEdit{{$cmt->id}}() {
					            		$('#formEdit{{$cmt->id}}').show();
					            	}
					            	function hideFormEdit{{$cmt->id}}() {
					            		$('#formEdit{{$cmt->id}}').hide();
					            	}
					            </script>
					            @endif
					            @endforeach
					        </ul>
				        </div>
		            </li>
		            <script type="text/javascript">
		            	function showFormReply{{$comment->id}}(){
		            		$('#formReply{{$comment->id}}').removeClass('hidden');
		            		$('#btnShow{{$comment->id}}').addClass('hidden');
		            		$('#btnHide{{$comment->id}}').removeClass('hidden');
		            	}
		            	function hideFormReply{{$comment->id}}(){
		            		$('#formReply{{$comment->id}}').addClass('hidden');
		            		$('#btnShow{{$comment->id}}').removeClass('hidden');
		            		$('#btnHide{{$comment->id}}').addClass('hidden');
		            	}
		            	function showFormEdit{{$comment->id}}() {
		            		$('#formEdit{{$comment->id}}').show();
		            	}
		            	function hideFormEdit{{$comment->id}}() {
		            		$('#formEdit{{$comment->id}}').hide();
		            	}
		            </script>
		            <hr/>
		            @endif
		            @endforeach
		        </ul>
		        <div class="spacing"></div>
		        <div class="hidden-xs hidden-sm">
			        <p>Xem thêm:</p>
					<ul class="list-unstyled">
					    @foreach(\App\Models\Post::recentPosts() as $recentPost)
						@if($recentPost->id != $post->id)
					    <li class="col-md-6">
					        <h4><a href="/post/view/{{$post->id}}">{{$recentPost->title}}</a></h4>
					        <small class="text-muted">{{$recentPost->created_at}}</small>
					    </li>
					    @endif
					    @endforeach
					</ul>
				</div>
			</div>
		</div>

		<div class="col-lg-4">
			@include('post.__nav_right')
	        <div class="spacing"></div>
		</div>

	</div>
</div>
@endsection