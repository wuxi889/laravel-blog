<ul class="navbar-nav mr-auto">
    @auth
        <li @if (Request::is('admin/article*')) class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="/article">文章</a>
        </li>
        <li @if (Request::is('admin/tag*')) class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="/category">分类</a>
        </li>
        <li @if (Request::is('admin/tag*')) class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="/tag">标签</a>
        </li>
        <li @if (Request::is('admin/resource*')) class="nav-item active" @else class="nav-item" @endif>
            <a class="nav-link" href="/resource">资源</a>
        </li>
    @endauth
</ul>

<ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="{{ env('APP_URL') }}" target="_blank">站点首页</a></li>
    @guest
        <li class="nav-item"><a class="nav-link" href="/login">登录</a></li>
    @else
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
               aria-expanded="false">
                {{ Auth::user()->name }}
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="/logout">退出</a>
            </div>
        </li>
    @endguest
</ul>