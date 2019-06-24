<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <meta charset="utf-8">
    <title>Hotels</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
  </head>
  <body>
    <header class="header" id="header">
      <nav class="header__nav">
        <div class="header__nav__logo logo">
          <h3 class="header__nav__primary logo__primary">Skyscraper</h3>
          <h4 class="header__nav__secondary logo__secondary">Hotels</h4>
        </div>
          <?php include '../includes/nav.php'; ?>
      </nav>
    </header>
    <div class="text-box">
      <div class="row">
        <form class="" action="" method="POST">
          <label>Hotel Name</label>
          <input type="text" name="HotelName" value=""><br><br>
          <span>Sort Price : </span>
          <select class="" name="SortBy">
            <option value="High to low">High to low</option>
            <option value="low to high">Low to High</option>
          </select><br><br>
          <span>Price : </span>
          <select class="" name="PriceRange">
            <option value="0-150">$0-$150</option>
            <option value="150-250"> $150-$250</option>
            <option value="250-500"> >250$</option>
            <option value="All">All</option>
          </select><br><br>
          <input type="submit" name="submit_button" value="submit">
        </form>
    </div>
    <div class="row">
      <?php
          if(!isset($_POST['submit_button'])){
            echo "error setting submit input";

          } else {

            include 'Server.php';

            $city = $_POST['HotelName'] ;
            $price = $_POST['PriceRange'];

            // (Condition)?(thing's to do if condition true):(thing's to do if condition false);
            $orderType = ($_POST['SortBy'] == "low to high")? "DESC": "ASC" ;

             if($price != "All"){

                   $priceArry = explode("-",$price);
                   $firstValue = $priceArry[0];
                   $secondValue = $priceArry[1];
                   $firstValue = (int)$firstValue;
                   $secondValue = (int)$secondValue;


                   $hotel_query = (empty($city) && $price != "All")?
                                "SELECT *
                                    FROM Hotels
                                        WHERE ApproximatePrice
                                            BETWEEN  $firstValue  and $secondValue
                                                Order By 'price'
                                                  $orderType
                                ":"SELECT *
                                      FROM Hotels
                                        WHERE ApproximatePrice
                                          BETWEEN $firstValue and $secondValue
                                            and CityID = ( SELECT CityID From City WHERE CityName like '$city')
                                              Order BY Price
                                                $orderType
                                     ";

                 } else { // if price == All

                   $hotel_query = ((empty($city)) && $price == "All")?
                                  "SELECT *
                                      FROM Hotels
                                         ORDER BY  ApproximatePrice
                                           $orderType
                                  ":"SELECT *
                                        FROM Hotels
                                          WHERE HotelTags
                                            like '$city'
                                              Order By ApproximatePrice
                                                $orderType
                                   ";

                }

            $queryResult = mysqli_query($db,$hotel_query) or die("query error");
            if(mysqli_num_rows($queryResult) != 0){
        ?>


                  <?php
                      while($row = mysqli_fetch_assoc($queryResult)){
                        $description = $row['HotelDescription1'];
                        $hotelTitle = $row['HotelName'];
                        $hotelMotto = $row['HotelMotto'];
                        $hotelPrice = $row['ApproximatePrice'];
                        $hotelImage = $row['ImageID'];
                        $hotelID = $row['HotelID'];
                        $TheAfterQuery = "Select * FROM Images WHERE ImageID = {$hotelImage}";
                        $ResultImages = mysqli_query($db, $TheAfterQuery);
                        $executing = mysqli_fetch_assoc($ResultImages);
                        $primary = $executing['Image1'];
                  ?>

            <div class="container py-3">
              <div class="row">
                  <div class="col-md-12">
                  <div class="card">
                    <div class="row">
                              <div class="col col-md-4">
                                <img src="../img/<?php echo $primary ?>" class="w-100">
                              </div>
                            <div class="col col-md-8">
                                 <br>
                                 <h1 style="color:black;"><?php echo $hotelTitle ?></h1>
                                 <h4 style="color:black;"><i><?php echo $hotelMotto ?></i></h4>
                                 <hr>
                                 <br>
                                 <p style="color:black;"><?php echo $description ?></p>
                                 <h2 style="color:black;"><?php echo $hotelPrice ?><span> $</span></h2>
                                 <a class="btn btn-warning" href="../hotel.php?HotelID=<?php echo $hotelID ?>">Explore Rooms</a>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          <?php } ?>
          <?php
              } else {
                echo "No result found";
              }
            }


          ?>

    </div>

      </div>

<?php include 'popup.php'; ?>
            </body>
              </html>
