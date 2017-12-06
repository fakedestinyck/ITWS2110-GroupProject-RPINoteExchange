<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RPI Note Exchange') }} - @yield('title')</title>

    <!-- Bootstrap Core CSS -->

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="user-page">

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ config('app.url') }}/user">User Page</a>
        </div>
        <!-- /.navbar-header -->



        <ul class="nav navbar-top-links navbar-right">


            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i>{{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> My Account</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->


        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="/user"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>



                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Manage My Profile</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Posts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('user.posts.index') }}">See All Posts</a>
                            </li>
                            <li>
                                <a href="{{ route('posts.manage') }}">Manage My Posts</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                </ul>


            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

</div>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">@yield('h1_title')</h1>

                @yield('content')
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


<!-- /#wrapper -->

<!-- model -->
<div class="modal fade" id="new-ask-for-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">New Request</h4>
            </div>
            <div class="modal-body">
                <p><span id="from"></span> asked for one of your item</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="ask-for-button" type="button">Details</button>
            </div>
        </div>
    </div>
</div>
<form id="new-ask-for-form" method="get">
    {{ csrf_field() }}
</form>
<!-- /model -->

<!-- jQuery -->
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script src="{{asset('js/libs.js')}}"></script>
<script language="javascript">
    Pusher.logToConsole = true;
    var pusher = new Pusher('e816d539e39837d20cf2', {
        cluster: "us2",
        encrypted: true
    });
    var askForChannel = pusher.subscribe('new-ask-for-channel');
    askForChannel.bind('App\\Events\\NewAskRequest', function(data){
        console.log(data.destinationUserId);
        if (data.destinationUserId == '{{ Auth::user()->id }}') {

            $('#from').html(data.fromName);
            $('#new-ask-for-form').attr('action', '{{ route('posts.manage') }}');
            $('#new-ask-for-modal').modal('show');
        }
    });
    $('#ask-for-button').on('click', function(){
        $('#new-ask-for-form').submit();
    });
</script>

@yield('footer')

</body>

</html>
