<header class="main-header">
    <!-- Logo -->
    <a href="{{url('admin')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>N</b>EW</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>New</b>Shop</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- Notifications: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('static/static')}}/main/avatar/img_avatar2.png" class="user-image" alt="User Image">
                        <span class="hidden-xs">admin</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{asset('static/static')}}/main/avatar/img_avatar2.png" class="img-circle" alt="User Image">

                            <p>
                                Alexander Pierce - Web Developer
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{route('admin.logout')}}" class="btn btn-default btn-flat" >
                                    Logout
                                </a>
                                {{--onclick="submitForm()"--}}
                                {{--<form id="logout_forms" action="{{route('categories.logout')}}" method="POST" style="display: none;">--}}
                                    {{--{{ csrf_field() }}--}}
                                {{--</form>--}}
                                <script type="text/javascript">
//                                    function submitForm(){
//                                        $.ajax({
//                                            url: laroute.route('categories.logout'),
//                                            type:"POST",
//                                            beforeSend: function (xhr) {
//                                                var token = $('meta[name="csrf_token"]').attr('content');
//
//                                                if (token) {
//                                                    return xhr.setRequestHeader('X-CSRF-TOKEN', token);
//                                                }
//                                            },
//                                            success:function(data){
//                                                alert(data);
//                                            },error:function(){
//                                                alert("error!!!!");
//                                            }
//                                        }); //end of ajax
////                                        $.post(laroute.route('categories.logouts'), function (data) {
//////
////                                        })
//                                    }


                                </script>
                                {{--<a href="#" >Sign out</a>--}}
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->

            </ul>
        </div>
    </nav>
</header>
