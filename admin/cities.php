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
                          <?php insertCity(); ?>

                          <form class="" action="" method="post">
                            <div class="form-group">
                              <label for="CityName">Add City</label>
                              <input class="form-control" type="text" name="CityName" value="">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary" type="submit" name="submit" value="Add City">
                            </div>
                          </form>

                          <?php
                          if(isset($_GET['edit'])){
                            $cat_id= $_GET['edit'];
                            include "includes/edit_categories.php";
                          }

                           ?>

                        </div><!--Add Category Form-->

                        <div class="col-xs-6">

                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>City</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php //FIND AND DISPLAY ALL CATEGORIES IN THE DATABASE
                                $CityQuery = "Select * From City";
                                $selectCities = mysqli_query($connection, $CityQuery);
                                while($row = mysqli_fetch_assoc($selectCities)){
                                  $city_id = $row['CityID'];
                                  $city_name = $row['CityName'];
                                 ?>
                              <tr>
                                <td><?php echo $city_id ?></td>
                                <td><?php echo $city_name ?></td>
                                <td><a href="cities.php?delete=<?php echo $city_id  ?>">Delete city</a></td>
                                <td><a href="cities.php?edit=<?php echo $city_id  ?>">Edit city</a></td>
                              </tr>
                                <?php }?>

                                <?php
                                //DELETE QUERY
                                deleteCategory();

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
