
<!-- <div class="fb-page" data-href="https://www.facebook.com/Jigsaw-Puzzles-Online-1396857953674092/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Jigsaw-Puzzles-Online-1396857953674092/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Jigsaw-Puzzles-Online-1396857953674092/">Jigsaw Puzzles Online</a></blockquote></div> -->
<h4>Bài viết phổ biến</h4>
<!-- <div class="hline"></div> -->
<div class="spacing"></div>
<ul class="popular-posts">
    @foreach(\App\Models\Post::recentPosts() as $post)
    <li style="margin:-20px 0px">
        <p><a href="/post/view/{{$post->id}}">{{$post->title}}</a></p>
        <em>{{$post->created_at}}</em>
    </li>
    @endforeach
</ul>
<div class="spacing"></div>

<h4>Chủ đề</h4>
    <p><a href="/post/category/php"><i class="fa fa-angle-right"></i> PHP</a> <span class="badge badge-theme pull-right">{{\App\Models\Php::countPhp()}}</span></p>
    <p><a href="/post/category/laravel"><i class="fa fa-angle-right"></i> Laravel framework</a> <span class="badge badge-theme pull-right">{{\App\Models\Laravel::countLaravel()}}</span></p>
    <p><a href="/post/category/bootstrap"><i class="fa fa-angle-right"></i> Bootstrap</a> <span class="badge badge-theme pull-right">{{\App\Models\Bootstrap::countBootstrap()}}</span></p>

<div class="spacing"></div>


<h4>Từ khóa tìm kiếm</h4>
<p>
    <a class="btn btn-sm btn-rectangle btn-theme" href="/post/search?keyword=Design" role="button">Design</a>
    <a class="btn btn-sm btn-rectangle btn-theme" href="/post/search?keyword=Wordpress" role="button">Wordpress</a>
    <a class="btn btn-sm btn-rectangle btn-theme" href="/post/search?keyword=Flat" role="button">Flat</a>
    <a class="btn btn-sm btn-rectangle btn-theme" href="/post/search?keyword=Modern" role="button">Modern</a>
    <a class="btn btn-sm btn-rectangle btn-theme" href="/post/search?keyword=Wallpaper" role="button">Wallpaper</a>
    <a class="btn btn-sm btn-rectangle btn-theme" href="/post/search?keyword=HTML5" role="button">HTML5</a>
    <a class="btn btn-sm btn-rectangle btn-theme" href="/post/search?keyword=CSS3" role="button">CSS3</a>
    <a class="btn btn-sm btn-rectangle btn-theme" href="/post/search?keyword=Developer" role="button">Developer</a>
    <a class="btn btn-sm btn-rectangle btn-theme" href="/post/search?keyword=Windows" role="button">Windows</a>
    <a class="btn btn-sm btn-rectangle btn-theme" href="/post/search?keyword=Bootstrap" role="button">Bootstrap</a>
    <a class="btn btn-sm btn-rectangle btn-theme" href="/post/search?keyword=Laravel" role="button">Laravel</a>
    <a class="btn btn-sm btn-rectangle btn-theme" href="/post/search?keyword=Phothosop" role="button">Phothosop</a>
</p>