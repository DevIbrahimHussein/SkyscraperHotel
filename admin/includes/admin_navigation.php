<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
      <li><a href="../index.php"><i class="fas fa-fw fa-home"></i>&nbsp;Home</a></li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-user">&nbsp;&nbsp;</i><?php echo $_SESSION['username'] ?><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php"><i class="fas fa-fw fa-chart-line"></i> Dashboard</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fas fa-fw fa-building "></i> Hotels <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="hotels.php?source=view_all_hotels">View All Hotels</a>
                    </li>
                    <li>
                        <a href="hotels.php?source=add_hotel">Add Hotel</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#rooms"><i class="fas fa-door-closed"></i> Rooms <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="rooms" class="collapse">
                    <li>
                        <a href="rooms.php?source=view_all_rooms">View All Rooms</a>
                    </li>
                    <li>
                        <a href="rooms.php?source=add_room">Add Room</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="cities.php"><i class="fa fa-fw fas fa-map"></i> Cities </a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#images"><i class="fas fa-fw fas fa-images "></i> Images <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="images" class="collapse">
                    <li>
                        <a href="images.php?source=view_all_images">View All Images</a>
                    </li>
                    <li>
                        <a href="images.php?source=add_images">Add Images</a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="comments.php"><i class="fa fa-fw fas fa-comments"></i> Comments</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fas fa-fw fa-users"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="posts_dropdown" class="collapse">
                    <li>
                        <a href="users.php?source=view_all_users">View all users</a>
                    </li>
                    <li>
                        <a href="users.php?source=add_user">Add users</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="services.php"><i class="fa fa-fw fas fa-plus"></i> Services </a>
            </li>
            <li>
                <a href="profile.php"><i class="fa fa-fw fa-user-circle"></i> Profile</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
