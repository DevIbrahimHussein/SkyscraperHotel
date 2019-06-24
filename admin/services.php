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

                        <div class="col-xs-6">
                          <?php insertService(); ?>

                          <form class="" action="" method="post">
                            <div class="form-group">
                              <label for="ServiceName">Add Service Name</label>
                              <input class="form-control" type="text" name="ServiceName" value="">
                            </div>
                            <div class="form-group">
                              <label for="SericeDescription">Add Service Description</label>
                              <input class="form-control" type="text" name="ServiceDescription" value="">
                            </div>
                            <div class="form-group">
                              <label for="SericePrice">Add Service Price</label>
                              <input class="form-control" type="int" name="ServicePrice" value="">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit" value="Add Service">
                            </div>
                          </form>

                        </div><!--Add Category Form-->

                        <div class="col-xs-6">

                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Service Name</th>
                                <th>Service Description</th>
                                <th>Service Price</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php //FIND AND DISPLAY ALL CATEGORIES IN THE DATABASE
                                $ServicesQuery = "Select * From Services";
                                $selectServices = mysqli_query($connection, $ServicesQuery);
                                while($row = mysqli_fetch_assoc($selectServices)){
                                  $service_id = $row['ServiceID'];
                                  $service_name = $row['ServiceName'];
                                  $service_description = $row['Description'];
                                  $service_price = $row['Price'];
                                 ?>
                              <tr>
                                <td><?php echo $service_id ?></td>
                                <td><?php echo $service_name ?></td>
                                <td><?php echo $service_description ?></td>
                                <td><?php echo $service_price ?></td>
                                <td><a href="services.php?delete=<?php echo $service_id  ?>">Delete Service</a></td>
                              </tr>
                                <?php }?>

                                <?php
                                //DELETE QUERY
                                deleteService();

                                 ?>
                            </tbody>
                          </table>
                        </div>



                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

<?php include "includes/admin_footer.php"?>
