<?php
    if(!isset($_SESSION)) {
        session_start();
    };

    if(!isset($_SESSION['username'])){
        $_SESSION['username']='Un-authenticated';
    }

?>
<nav class="navbar navbar-inverse navbar-custom rad-0"  role="navigation" style="">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL('home')}}">
                <i class="fa fa-box-open"></i>&nbsp;Ulimi Net
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse main-nav">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{($c_page=='users') ? 'active' : ''}}">
                    <a  href="{{URL('users')}}">
                        <i class="fa fa-users"></i>&nbsp;Users
                    </a>
                </li>
                <li class="{{($c_page=='feeds') ? 'active' : ''}}">
                    <a href="{{URL('feeds')}}">
                        <i class="fa fa-archive"></i>&nbsp;Feeds
                    </a>
                </li>
                <li class="{{($c_page=='seeds') ? 'active' : ''}}">
                    <a href="{{URL('seeds')}}">
                        <i class="fa fa-box"></i>&nbsp;Seeds
                    </a>
                </li>
                <li class="{{($c_page=='posts') ? 'active' : ''}}">
                    <a href="{{URL('posts')}}" >
                        <i class="fa fa-comments"></i>&nbsp;Posts
                    </a>
                </li>
                <li class="{{($c_page=='market') ? 'active' : ''}}">
                    <a href="{{route('market.index')}}" >
                        <i class="fa fa-shopping-cart"></i>&nbsp;Market Place
                    </a>
                </li>
                <li>
                    <a href="" class="dropdown-toggle" style="" data-toggle="dropdown">
                        <i class="fa fa-clone"></i>&nbsp;Categories
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu nav-dropdown" >
                        <li>
                            <a href="#create-feed-cat-window" data-toggle="modal">
                                <i class="fa fa-plus-circle"></i>&nbsp;Feeds
                            </a>
                        </li>
                        <li>
                            <a href="#create-seed-cat-window" data-toggle="modal">
                                <i class="fa fa-plus-circle"></i>&nbsp;Seeds
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{URL('feed-cats')}}">
                                <i class="fa fa-external-link-alt"></i>&nbsp;Feeds
                            </a>
                        </li><li>
                            <a href="{{URL('seed-cats')}}" >
                                <i class="fa fa-external-link-alt"></i>&nbsp;Seeds
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#change-password-window" data-toggle="modal" title="Logout">
                        <i class="fa fa-user-circle"></i>&nbsp;{{Auth::user()->username}}
                    </a>
                </li>
                <li>
                    <form action="{{route('logout')}}" method="POST" id="logout-form">@csrf</form>
                    <a href="#logout" onclick="document.getElementById('logout-form').submit()" title="Logout">
                        <i class="fa fa-sign-out-alt"></i>&nbsp;Logout
                    </a>
                </li>
            </ul>
        </div><!-- /.main-nav -->
    </div>
</nav><!-- ./nav -->