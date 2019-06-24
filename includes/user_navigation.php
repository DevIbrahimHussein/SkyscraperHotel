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
        <a class="navbar-brand">User</a>
    </div>
    <!-- Top Menu Items -->

    <ul class="nav navbar-right top-nav">
      <li><a href="index.php"><i class="fas fa-fw fa-home"></i>&nbsp;Home</a></li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-user">&nbsp;&nbsp;</i><?php echo $_SESSION['username'] ?><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="admin/includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="user.php"><i class="fas fa-fw fa-chart-line"></i> Profile</a>
            </li>
            <li>
                <a href="bookings.php"><i class="fa fa-fw fas fa-map"></i> Bookings </a>
            </li>
            <li>
                <a href="services.php"><i class="fa fa-fw fas fa-plus"></i> Services </a>
            </li>
            <li>
                <a href="checkout.php"><i class="fa fa-fw fa-user-circle"></i> CheckOut</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
