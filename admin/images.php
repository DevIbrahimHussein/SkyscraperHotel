<?php include "includes/admin_header.php" ?>
<?php include "functions.php" ?>
    <div id="wrapper">


<!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                      <h1 class="page-header">
                          Skyscraper
                          <small>Hotels</small>
                      </h1>

                  <?php

                  if(isset($_GET['source'])){
                    $source = $_GET['source'];
                  }
                  else {
                    $source = '';
                  }

                  switch($source) {
                    case 'add_images';
                    include "includes/add_images.php";
                    break;

                    case 'edit_images';
                    include "includes/edit_images.php";
                    break;

                    default:
                    include "includes/view_all_images.php";
                    break;
                  }


                  ?>

                      </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

<?php include "includes/admin_footer.php"?>
