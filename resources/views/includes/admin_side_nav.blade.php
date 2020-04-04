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
                <a href="/admin"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin.users.index')}}"><i class="fas fa-user-friends"></i> All Users</a>
                    </li>

                    <li>
                        <a href="{{route('admin.users.create')}}"><i class="fas fa-user-plus"></i> Create User</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fas fa-file-alt"></i> Posts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin.posts.index')}}"><i class="fas fa-file-alt"></i> All Posts</a>
                    </li>

                    <li>
                        <a href="{{route('admin.posts.create')}}"><i class="fas fa-edit"></i> Create Post</a>
                    </li>

                    <li>
                        <a href="{{route('admin.comments.index')}}"><i class="fas fa-comments"></i> All Comments</a>
                    </li>

                    <li>
                        <a href="{{route('admin.replies.index')}}"><i class="fas fa-reply-all"></i> All Replies</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>


            <li>
                <a href="#"><i class="fas fa-th-large"></i> Categories<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin.categories.index')}}"><i class="fas fa-th"></i> All Categories</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>


            <li>
                <a href="#"><i class="fas fa-image"></i> Media<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin.media.index')}}"><i class="fas fa-image"></i> All Media</a>
                    </li>

                    <li>
                        <a href="{{route('admin.media.create')}}"><i class="fa fa-upload fa-fw"></i> Upload Media</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>

        </ul>


    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->