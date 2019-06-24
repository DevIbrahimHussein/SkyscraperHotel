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
                                      and CityID = (SELECT CityID From City WHERE HotelName like '$city')
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
                                        ORDER BY ApproximatePrice
                                          $orderType
                             ";

          }

      $queryResult = mysqli_query($db,$hotel_query) or die("query error");
      if(mysqli_num_rows($queryResult) != 0){
  ?>
        <!DOCTYPE html>
        <html lang="en" dir="ltr">
          <head>
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            <meta charset="utf-8">
            <title>Hotels</title>
          </head>
          <body>
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
                           <h1><?php echo $hotelTitle ?></h1>
                           <h4><i><?php echo $hotelMotto ?></i></h4>
                           <hr>
                           <br>
                           <p><?php echo $description ?></p>
                           <h2><?php echo $hotelPrice ?><span> $</span></h2>
                           <a class="btn btn-warning" href="../hotel.php?HotelID=<?php echo $hotelID ?>">Explore Rooms</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    <?php } ?>
          </body>
        </html>

  <?php
      } else {
        echo "No result found";
      }
    }


  ?>
