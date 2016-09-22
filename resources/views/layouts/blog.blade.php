<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="/phpsimple_favicon.png">
	<title>php Simple</title>
	<!-- Bootstrap core CSS -->
	<link href="/blog/css/bootstrap.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="/blog/css/style.css" rel="stylesheet">
	<link href="/blog/css/font-awesome.min.css" rel="stylesheet">
	<!-- Just for debugging purposes. Don't actually copy this line! -->
	<!--[if lt IE 9]><script src="../..//blog/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
<style type="text/css">
	@font-face {
		font-family: connieFont;
		src: url(/fonts/Connie-Regular.ttf);
	}
	textarea{
		resize: vertical;
		height: auto;
	}
	pre{
		border-radius: 0px;
	}
	body{
		background-color: #fff;
	}
	#content{
		margin-top: -50px;
	}
	.navbar-default{
		border-radius: 0px;
	}
	.navbar-brand:hover{
		color: #00b3fe !important;
	}
	.nav-bottom{
		color: #384452;
	}
	ul .active .nav-bottom{
		color: #00b3fe !important;
	}
	.dropdown-menu li a {
		color: #fff !important;
	}
	.dropdown-menu li a:hover{
		color: #00b3fe !important;
	}
	.displayBlock{
		display: block;
	}
	.btn-circle{
		width: 30px;
		height: 30px;
		text-align: center;
		padding: 6px 0;
		font-size: 12px;
		line-height: 1.42;
		border-radius: 15px;
	}
	.btnTop{
		position:fixed;
		bottom: 50px;
		right: 10px;
		opacity: 0.7;
		display: none;
	}
	.input-search{
		margin-top: 10px;
		border-color: lightgray;
		border-radius: 25px;
		padding: 30px;
		box-shadow: none;
	}
	.input-search:focus{
		background-color: #f2f2f2;
	}
	.item-search{
		background-color: #fff;
		margin-bottom: 10px;
	}
	.border-item{
		outline: 1px solid lightgray;
		overflow: auto;
		background-color: #fff;
	}
	.btn-rectangle{
		border-radius: 0px;
	}
</style>
</head>
<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/" style=""><img src="/img/phpsimple.png" style="margin-top:-8px"><b>phpsimple</b></a>
			</div>
			<div class="navbar-collapse collapse navbar-right" style="margin-right:-28px">
				<ul class="nav navbar-nav">
					@if (Auth::user())
					<li class="dropdown {{\App\Helper\MenuHelper::get('profile')}}">
						<a href="javascript:;" class="dropdown-toggle text-right" data-toggle="dropdown"><img src="{{\Auth::user()->getavatar()}}" height="23" width="23"> {{\Auth::user()->name}} <b class="caret"></b></a>
						<ul class="dropdown-menu">
							@if(\Auth::user()->role_id != 3)
							<li><a href="/admin" class="text-right">DASHBOARD</a></li>
							<li class="{{ \Request::is( 'post/create*') ? 'active' : '' }}"><a href="/admin/post/create" class="text-right">VIẾT BÀI</a></li>
							<li class="{{ \Request::is( 'post/myposts*') ? 'active' : '' }}"><a href="/admin/post" class="text-right">TẤT CẢ BÀI VIẾT</a></li>
							@endif
							<li><a href="/user/profile" class="text-right">TÀI KHOẢN</a></li>
							<li><a href="/logout" class="text-right">ĐĂNG XUẤT</a></li>
						</ul>
					</li>
					@else
					<li><a href="{{ url('/login') }}" class="text-right">ĐĂNG NHẬP</a></li>
					@endif
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
	<nav class="">
		<div class="container">
			<div class="row">
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li class="{{ \Request::is( 'post/category/php*') ? 'active' : '' }}"><a href="/post/category/php" class="nav-bottom text-right">PHP</a></li>
						<li class="{{ \Request::is( 'post/category/laravel*') ? 'active' : '' }}"><a href="/post/category/laravel" class="nav-bottom text-right">Laravel frameword</a></li>
						<li class="{{ \Request::is( 'post/category/bootstrap*') ? 'active' : '' }}"><a href="/post/category/bootstrap" class="nav-bottom text-right">Bootstrap</a></li>
					</ul>
					<div class="navbar-collapse collapse navbar-right" style="margin-right:-15px">
						<ul class="nav navbar-nav">
							<li><a href="javascript:;" class="icon-show-search text-right nav-bottom" onclick="showSearchBox()"><i class="fa fa-search"></i></a></li>
							<li><a href="javascript:;" class="icon-hide-search text-right hidden nav-bottom" onclick="hideSearchBox()"><i class="fa fa-times"></i></a></li>
						</ul>
					</div>
				</div><!-- /.navbar-collapse -->
				<div class="col-md-12">
					<hr style="margin:0px" />
				</div>
			</div><!-- /.container-fluid -->
		</div>
	</nav>
	<div class="row item-search hidden">
		<div class="container">
			<form action="/post/search" method="GET" class="form-horizontal">
				<input type="text" name="keyword" placeholder="Tìm tiêu đề bài viết ..." class="input-lg form-control input-search" value="{{Session::get('keyword')}}">
			</form>
		</div>
	</div>
	<div id="content">
		@yield('content')
	</div>
	<div id="footerwrap">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h4>Giới thiệu</h4>
					<div class="hline-w"></div>
					<p><b>phpsimple</b> là blog viết về các kiến thức căn bản về lập trình PHP, nội dung chủ yếu là hướng dẫn trên Frameword Laravel, nếu bạn thấy hay thì hãy like và subscribe các bài viết nhé...!</p>
				</div>
				<div class="col-lg-4">
					<h4>Website</h4>
					<div class="hline-w"></div>
					<p>Giao diện sử dụng dựa trên <a href="http://blacktie.co/demo/solid/" target="_blank">Solid Theme</a></p>
				</div>
				<div class="col-lg-4">
					<h4>Tác giả</h4>
					<div class="hline-w"></div>
					<p>
						Nguyễn Văn Thanh<br/>
						<!-- Email: nguyenvanthanh9595@gmail.com<br/> -->
						<a href="/login">Login</a><br/>
					</p>
				</div>

			</div>
		</div>
	</div>
	<a href="#top" class="btn btn-info btn-circle btnTop"><i class="fa fa-angle-up"></i></a>
	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="/blog/js/bootstrap.min.js"></script>
	<script src="/plugin/ckeditor_blog/ckeditor.js"></script>
	<script src="https://apis.google.com/js/plusone.js" type="text/javascript"></script>
	<script type="text/javascript">
		$("a[href='#top']").click(function() {
			$("html, body").animate({ scrollTop: 0 }, "slow");
			return false;
		});
		$(window).on("scroll", function() {
			var scrollPos = $(window).scrollTop();
			if (scrollPos <= 150) {
				$(".btnTop").fadeOut();
			} else {
				$(".btnTop").fadeIn();
			}
		});
		function showSearchBox(){
			$('.item-search').removeClass('hidden');
			$('.icon-show-search').addClass('hidden');
			$('.icon-hide-search').removeClass('hidden');
		}
		function hideSearchBox(){
			$('.item-search').addClass('hidden');
			$('.icon-show-search').removeClass('hidden');
			$('.icon-hide-search').addClass('hidden');
		}
		@if(\Request::is( 'post/search*'))
			$(document).ready(function(){
				$('.icon-show-search').trigger('click');
			});
		@endif
	</script>
</body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.7&appId=279333842446588";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

</html>
