
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from phantom-themes.com/space/theme/templates/admin2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 May 2021 16:09:15 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>PIC-ART | Backend</title>
        
        @yield('prestyle')
        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="{{ url('/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{ url('/assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{ url('/assets/plugins/icomoon/style.css')}}" rel="stylesheet">
        <link href="{{ url('/assets/plugins/uniform/css/default.css')}}" rel="stylesheet"/>
        <link href="{{ url('/assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet"/>
        <link href="{{ url('/assets/plugins/nvd3/nv.d3.min.css')}}" rel="stylesheet">  
      
        <!-- Theme Styles -->
        <link href="{{ url('/assets/css/space.min.css')}}" rel="stylesheet">
        <link href="{{ url('/assets/css/themes/admin2.css')}}" rel="stylesheet">
        <link href="{{ url('/assets/css/custom.css')}}" rel="stylesheet">
        @yield('poststyle')

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar">
                <a class="logo-box" href="{{ url('/backend') }}">
                    <span>Backend</span>
                    <!--<i class="icon-radio_button_unchecked" id="fixed-sidebar-toggle-button"></i>-->
                    <!--<i class="icon-close" id="sidebar-toggle-button-close"></i>-->
                </a>
                <div class="page-sidebar-inner">
                    <div class="page-sidebar-menu">
                        <ul class="accordion-menu">
                            <li class="active-page">
                                <a href="{{ url('/backend') }}">
                                    <i class="menu-icon icon-home4"></i><span>Home</span>
                                </a>
                            </li>
                            <li class="menu-divider"></li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-camera"></i><span>Photos</span><i class="accordion-icon icon-sort"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('backend.photo.index') }}"><i class="menu-icon icon-eye"></i>View all photos</a></li>
                                    <li><a href="{{ route('backend.photo.create') }}"><i class="menu-icon icon-plus"></i>Create a new photo</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-settings"></i><span>Presets</span><i class="accordion-icon icon-sort"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('backend.preset.index') }}"><i class="menu-icon icon-eye"></i>View all presets</a></li>
                                    <li><a href="{{ route('backend.preset.create') }}"><i class="menu-icon icon-plus"></i>Create a new preset</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-comment"></i><span>Comments</span><i class="accordion-icon icon-sort"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('backend.comment.index') }}"><i class="menu-icon icon-eye"></i>View all comments</a></li>
                                    <li><a href="{{ route('backend.comment.create') }}"><i class="menu-icon icon-plus"></i>Create a new comment</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="charts.html">
                                    <i class="menu-icon icon-loupe"></i><span>Favourites</span><i class="accordion-icon icon-sort"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('backend.favourite.index') }}"><i class="menu-icon icon-eye"></i>View all favourites</a></li>
                                    <li><a href="{{ route('backend.favourite.create') }}"><i class="menu-icon icon-plus"></i>Create a new favourite</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-heart"></i><span>Likes</span><i class="accordion-icon icon-sort"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('backend.like.index') }}"><i class="menu-icon icon-eye"></i>View all likes</a></li>
                                    <li><a href="{{ route('backend.like.index') }}"><i class="menu-icon icon-plus"></i>Create a new like</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-cart"></i><span>Purchases</span><i class="accordion-icon icon-sort"></i>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('backend.purchase.index') }}"><i class="menu-icon icon-eye"></i>View all purchases</a></li>
                                    <li><a href="{{ route('backend.purchase.create') }}"><i class="menu-icon icon-plus"></i>Create a new purchase</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-star"></i><span>Valuations</span><i class="accordion-icon icon-sort"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('backend.valuation.index') }}"><i class="menu-icon icon-eye"></i>View all valuations</a></li>
                                    <li><a href="{{ route('backend.valuation.create') }}"><i class="menu-icon icon-plus"></i>Create a new valuation</a></li>
                                </ul>
                            </li>
                            <li class="menu-divider"></li>
                            <li>
                                <a href="{{ route('backend.user.index') }}">
                                    <i class="menu-icon icon-user"></i><span>Users</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- /Page Sidebar -->
            
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="search-form">
                        <form action="#" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="close-search" type="button"><i class="icon-close"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <div class="logo-sm">
                                    <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fa fa-bars"></i></a>
                                    <a class="logo-box" href="index-2.html"><span>Space</span></a>
                                </div>
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                        
                            <!-- Collect the nav links, forms, and other content for toggling -->
                        
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="javascript:void(0)" id="collapsed-sidebar-toggle-button"><i class="icon-menu"></i></a></li>
                                    <li><a href="javascript:void(0)" id="toggle-fullscreen"><i class="icon-tv"></i></a></li>
                                    <li><a href="javascript:void(0)" id="search-button"><i class="icon-search"></i></a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="javascript:void(0)" class="right-sidebar-toggle" data-sidebar-id="main-right-sidebar"><i class="icon-message"></i></a></li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon-bell"></i></a>
                                        <ul class="dropdown-menu dropdown-lg dropdown-content">
                                            <li class="drop-title">Notifications<a href="#" class="drop-title-link"><i class="icon-bell"></i></a></li>
                                            <li class="slimscroll dropdown-notifications">
                                                <ul class="list-unstyled dropdown-oc">
                                                    <li>
                                                        <a href="#"><span class="notification-badge bg-primary"><i class="fa fa-photo"></i></span>
                                                            <span class="notification-info">Finished uploading photos to gallery <b>"South Africa"</b>.
                                                                <small class="notification-date">20:00</small>
                                                            </span></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><span class="notification-badge bg-primary"><i class="fa fa-at"></i></span>
                                                            <span class="notification-info"><b>John Doe</b> mentioned you in a post "Update v1.5".
                                                                <small class="notification-date">06:07</small>
                                                            </span></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><span class="notification-badge bg-danger"><i class="fa fa-bolt"></i></span>
                                                            <span class="notification-info">4 new special offers from the apps you follow!
                                                                <small class="notification-date">Yesterday</small>
                                                            </span></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><span class="notification-badge bg-success"><i class="fa fa-bullhorn"></i></span>
                                                            <span class="notification-info">There is a meeting with <b>Ethan</b> in 15 minutes!
                                                                <small class="notification-date">Yesterday</small>
                                                            </span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="http://via.placeholder.com/36x36" alt="" class="img-circle"></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Profile</a></li>
                                            <li><a href="#">Calendar</a></li>
                                            <li><a href="#"><span class="badge pull-right badge-danger">42</span>Messages</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#">Account Settings</a></li>
                                            <li><a href="#">Log Out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div><!-- /Page Header -->
                <!-- Page Inner -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /Page Inner -->
                <div class="page-right-sidebar" id="main-right-sidebar">
                    <div class="page-right-sidebar-inner">
                        <div class="right-sidebar-top">
                            <div class="right-sidebar-tabs">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active" id="chat-tab"><a href="#chat" aria-controls="chat" role="tab" data-toggle="tab">chat</a></li>
                                    <li role="presentation" id="settings-tab"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">settings</a></li>
                                </ul>
                            </div>
                            <a href="javascript:void(0)" class="right-sidebar-toggle right-sidebar-close" data-sidebar-id="main-right-sidebar"><i class="icon-close"></i></a>
                        </div>
                        <div class="right-sidebar-content">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="chat">
                                    <div class="chat-list">
                                        <span class="chat-title">Recent</span>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item unread" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">David</span>
                                                <span class="chat-text">where u at?</span>
                                                <span class="chat-time">08:50</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item unread active-user" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">Daisy</span>
                                                <span class="chat-text">Daisy sent a photo.</span>
                                                <span class="chat-time">11:34</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="chat-list">
                                        <span class="chat-title">Older</span>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">Tom</span>
                                                <span class="chat-text">You: ok</span>
                                                <span class="chat-time">2d</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item active-user" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">Anna</span>
                                                <span class="chat-text">asdasdasd</span>
                                                <span class="chat-time">4d</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="right-sidebar-toggle chat-item active-user" data-sidebar-id="chat-right-sidebar">
                                            <div class="user-avatar">
                                                <img src="http://via.placeholder.com/40x40" alt="">
                                            </div>
                                            <div class="chat-info">
                                                <span class="chat-author">Liza</span>
                                                <span class="chat-text">asdasdasd</span>
                                                <span class="chat-time">&nbsp;</span>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="load-more-messages"  data-toggle="tooltip" data-placement="bottom" title="Load More">&bull;&bull;&bull;</a>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="settings">
                                    <div class="right-sidebar-settings">
                                        <span class="settings-title">General Settings</span>
                                        <ul class="sidebar-setting-list list-unstyled">
                                            <li>
                                                <span class="settings-option">Notifications</span><input type="checkbox" class="js-switch" checked />
                                            </li>
                                            <li>
                                                <span class="settings-option">Activity log</span><input type="checkbox" class="js-switch" checked />
                                            </li>
                                            <li>
                                                <span class="settings-option">Automatic updates</span><input type="checkbox" class="js-switch" />
                                            </li>
                                            <li>
                                                <span class="settings-option">Allow backups</span><input type="checkbox" class="js-switch" />
                                            </li>
                                        </ul>
                                        <span class="settings-title">Account Settings</span>
                                        <ul class="sidebar-setting-list list-unstyled">
                                            <li>
                                                <span class="settings-option">Chat</span><input type="checkbox" class="js-switch" checked />
                                            </li>
                                            <li>
                                                <span class="settings-option">Incognito mode</span><input type="checkbox" class="js-switch" />
                                            </li>
                                            <li>
                                                <span class="settings-option">Public profile</span><input type="checkbox" class="js-switch" />
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-right-sidebar" id="chat-right-sidebar">
                    <div class="page-right-sidebar-inner">
                        <div class="right-sidebar-top">
                            <div class="chat-top-info">
                                <span class="chat-name">Noah</span>
                                <span class="chat-state">2h ago</span>
                            </div>
                            <a href="javascript:void(0)" class="right-sidebar-toggle chat-sidebar-close pull-right" data-sidebar-id="chat-right-sidebar"><i class="icon-keyboard_arrow_right"></i></a>
                        </div>
                        <div class="right-sidebar-content">
                            <div class="right-sidebar-chat slimscroll">
                                <div class="chat-bubbles">
                                <div class="chat-start-date">02/06/2017 5:58PM</div>
                                    <div class="chat-bubble them">
                                        <div class="chat-bubble-img-container">
                                            <img src="http://via.placeholder.com/38x38" alt="">
                                        </div>
                                        <div class="chat-bubble-text-container">
                                            <span class="chat-bubble-text">Hello</span>
                                        </div>
                                    </div>
                                    <div class="chat-bubble me">
                                        <div class="chat-bubble-text-container">
                                            <span class="chat-bubble-text">Hello!</span>
                                        </div>
                                    </div>
                                <div class="chat-start-date">03/06/2017 4:22AM</div>
                                    <div class="chat-bubble me">
                                        <div class="chat-bubble-text-container">
                                            <span class="chat-bubble-text">lorem</span>
                                        </div>
                                    </div>
                                    <div class="chat-bubble them">
                                        <div class="chat-bubble-img-container">
                                            <img src="http://via.placeholder.com/38x38" alt="">
                                        </div>
                                        <div class="chat-bubble-text-container">
                                            <span class="chat-bubble-text">ipsum dolor sit amet</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-write">
                                <form class="form-horizontal" action="javascript:void(0);">
                                    <input type="text" class="form-control" placeholder="Say something">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
        
        
        <!-- Javascripts -->
        @yield('prescript')
        <script src="{{ url('/assets/plugins/jquery/jquery-3.1.0.min.js')}}"></script>
        <script src="{{ url('/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{ url('/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
        <script src="{{ url('/assets/plugins/uniform/js/jquery.uniform.standalone.js')}}"></script>
        <script src="{{ url('/assets/plugins/switchery/switchery.min.js')}}"></script>
        <script src="{{ url('/assets/plugins/d3/d3.min.js')}}"></script>
        <script src="{{ url('/assets/plugins/nvd3/nv.d3.min.js')}}"></script>
        <script src="{{ url('/assets/plugins/flot/jquery.flot.min.js')}}"></script>
        <script src="{{ url('/assets/plugins/flot/jquery.flot.time.min.js')}}"></script>
        <script src="{{ url('/assets/plugins/flot/jquery.flot.symbol.min.js')}}"></script>
        <script src="{{ url('/assets/plugins/flot/jquery.flot.resize.min.js')}}"></script>
        <script src="{{ url('/assets/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{ url('/assets/plugins/flot/jquery.flot.pie.min.js')}}"></script>
        <script src="{{ url('/assets/plugins/chartjs/chart.min.js')}}"></script>
        <script src="{{ url('/assets/js/space.min.js')}}"></script>
        <script src="{{ url('/assets/js/pages/dashboard.js')}}"></script>
        @yield('postscript')
    </body>

<!-- Mirrored from phantom-themes.com/space/theme/templates/admin2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 May 2021 16:09:15 GMT -->
</html>