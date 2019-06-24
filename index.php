<?php include 'includes/header.php'; ?>

<?php
if(isset($_POST['view_all_hotels'])){
  header("Location: Filters/index.php");
}
?>

<h1 id="HotelsSection"class = "section-title u-center-text"> High-end Hotels <br/>& Ideal Prices</h1>
</br></br>
<h4 class="u-center-text section-description">Skyscraper Hotels offers you a wide variety of hotels from which you can choose your desired room size and compare prices with other hotels.</h4>
<br/><br/><br/><br/><br/>

<?php
$Query = "SELECT * FROM Hotels";
$Execute = mysqli_query($connection, $Query);
while($row = mysqli_fetch_assoc($Execute)) {
  $HotelID = $row['HotelID'];
  $HotelName = $row['HotelName'];
  $HotelRating = $row['HotelRating'];
  $HotelDescription = $row['HotelDescription1'];
  $HotelSuites = $row['HotelDescription2'];
  $HotelSpa = $row['HotelDescription3'];
  $HotelMotto = $row['HotelMotto'];
  $Price = $row['ApproximatePrice'];
  $ImageID = $row['ImageID'];
  $Email = $row['Email'];
  $PhoneNumber = $row['PhoneNumber'];

?>

  <!-- FARAH'S SECTION FARAH'S SECTION FARAH'S SECTION FARAH'S SECTION FARAH'S SECTION FARAH'S SECTION -->
  <figure class="snip1563">
    <img  src="https://www.hotelpenn.com/wp-content/uploads/2016/06/Exterior-of-Hotel-Pennsylvania-across-from-Madison-Square-Garden.jpg" alt="sample110" />
    <figcaption>
      <br/><br/><br/><br/>
      <h3><?php echo $HotelName ?></h3>
      <p><?php for($i=0; $i<=$HotelRating; $i++){
        echo "<span class='starChecked'>&#x02605;</span>";
        } ?>
      <br/>
      <p> <?php echo $HotelDescription ?><br/><br/> Prices starting at:</p>
      <p><b>$</b> <font size="40px" face="yeseva-one"><?php echo $Price ?></font> <b>/PER NIGHT</b></p>
      <br><br>
    </figcaption>
    <a href="hotel.php?HotelID=<?php echo $HotelID ?>"></a>
  </figure>

<?php } ?>

  <!--hotel 1 stuff-->
    <!-- <div class = "greyBg">
      <img class="hotel1Image" src="Images/hotel1.jpg" alt="hotel 1" >
    </br></br>
        <h3 class="staff-name">
          Marina Hotel
        </h3>
        <span class="starChecked">&#x02605;</span>
        <span class="starChecked">&#x02605;</span>
        <span class="starChecked">&#x02605;</span>
        <span class="starChecked">&#x02605;</span>
        <span class="starChecked">&#x02605;</span>
        <br><br>
        <h4 class="section-description">
          Enjoy our highest rated hotel on our website. Marina Hotel is located on the shore of the city, with a spectacular view
          of the sea from one side, and the other side overlooks the city. Besides the fact that it's located directly next to the sea,
          it is enhanced with 3 pools, a nursery for your kids, and hosts a gourmet kitchen with professional chefs ready to cook
          any dish from the hotel's sophisticated menu. Prices starting at:
        </h4>
        <br><br>
        <b>$</b> <font size="40px" face="yeseva-one">400</font> <b>/PER NIGHT</b>
        <br><br>
        <a class="buttonHotel1" href="farahs/profiles.php">Book Now</a>
      </div>
      <br><br><br><br>
      <!--end of hotel1 stuff-->

    <!--hotel2-->
    <!-- <div>
      <img class="hotelsImages" src="Images/hotel4.jpg" alt="hotel 4">
      <div class ="regTitle">
        Palm Hotel
      </div>
      <span class="starChecked">&#x02605;</span>
      <span class="starChecked">&#x02605;</span>
      <span class="starChecked">&#x02605;</span>
      <br><br>
      <div class="hotelsDesc">
        Palm hotel owns an exotic view of the sea shore, with its perfectly positioned location. This hotel also enjoys a homey feeling
        that's insured to make you feel at home, especially with their excellent room service and welcoming staff. Palm hotel has the feel
        of Greece with its cyclades architecture and its view of the clear blue sea. Prices start at:
      </div>
      <br>
      <b>$</b> <font size="40px" face="yeseva-one">250</font> <b>/PER NIGHT</b>
      <br><br>
      <a class="bookNowButton" href="farahs/profiles.php"> Book now </a>
    </div>
    <br><br><br><br>
  <!--end of hotel2 -->

  <br/><br/><br/><br/>

  <!--hotel3-->
  <!-- <div class = "greyBg">
    <img class="hotel1Image" src="Images/hotel3.jpg" alt="hotel 1" >
  </br></br>
      <h3 class="staff-name">
        Muse Resort & Spa
      </h3>
      <span class="starChecked">&#x02605;</span>
      <span class="starChecked">&#x02605;</span>
      <span class="starChecked">&#x02605;</span>
      <span class="starChecked">&#x02605;</span>
      <span class="starChecked">&#x02605;</span>
      <br><br>
      <h4 class="section-description">
        This hotel is guaranteed to give you all of the muse you need with its elite and artsy decor. Besides its spectacular decor, Muse
        Resort offers you a fine dining experience with its 4 stars kitchen.Located in the heart of the city with a fantastic view,
        equipped with an outdoor and an indoor pool,a full spa, and reasonable prices starting at:
      </h4>
      <br><br>
      <b>$</b> <font size="40px" face="yeseva-one">300</font> <b>/PER NIGHT</b>
      <br><br>
      <a class="buttonHotel1" href="farahs/profiles.php"> Book now </a>
    </div> -->
    <br><br><br><br>
<!--end of hotel3-->

<!--hotel4-->
<!--
<div style="margin-bottom: 10rem;">
  <img class="hotelsImages" src="Images/hotel4.jpg" alt="hotel 4">
  <div class ="regTitle">
    Palm Hotel
  </div>
  <span class="starChecked">&#x02605;</span>
  <span class="starChecked">&#x02605;</span>
  <span class="starChecked">&#x02605;</span>
  <br><br>
  <div class="hotelsDesc">
    Palm hotel owns an exotic view of the sea shore, with its perfectly positioned location. This hotel also enjoys a homey feeling
    that's insured to make you feel at home, especially with their excellent room service and welcoming staff. Palm hotel has the feel
    of Greece with its cyclades architecture and its view of the clear blue sea. Prices start at:
  </div>
  <br>
  <b>$</b> <font size="40px" face="yeseva-one">250</font> <b>/PER NIGHT</b>
  <br><br>
  <a class="bookNowButton" href="farahs/profiles.php"> Book now </a>
</div> -->
<br><br><br><br>
  <!-- FARAH'S SECTION FARAH'S SECTION FARAH'S SECTION FARAH'S SECTION FARAH'S SECTION FARAH'S SECTION -->
  <!-- <form action="index.php" method="post" style="padding-left: 55rem;">
  <input type="submit"  value="View All Hotels" name="view_all_hotels" class="buttonHotel1" name="Hotels"></input>
  </form> -->
  <!-- WALID'S SECTION WALID'S SECTION WALID'S SECTION WALID'S SECTION WALID'S SECTION WALID'S SECTION -->

    <!-- <div class="row TotalDiv">
    <div class="col-1-of-2 leftSec">
      <div>
    <h2 class="staff-name u-center-text">Junior Job Offers </h2>
    <p class="staff-description u-center-text">We're looking for experienced professionals </br>with personal point of view and problem-solving technique. </p>
    </br>
    </br>
    <h2 class="staff-name u-center-text">Middle Job Position </h2>
    <p class="staff-description u-center-text">We're looking for experienced professionals </br>with personal point of view and problem-solving technique. </p>
    </br>
    </br>
    <h2 class="staff-name u-center-text">Senior Job Position </h2>
    <p class="staff-description u-center-text">We're looking for experienced professionals </br>with personal point of view and problem-solving technique. </p>
    </div>
  </div>
    <div class="col-1-of-2 rightSec">
    </div>
    <div style="display: block; clear: both;"></div>
    </div> -->
    <!-- WALID'S SECTION WALID'S SECTION WALID'S SECTION WALID'S SECTION WALID'S SECTION WALID'S SECTION WALID'S SECTION-->
      <div id="GallerySection" class="gallery">
      <h1 class="section-title u-center-text black-background">This is our Gallery </h1>
      <p class="section-description u-center-text">Resortex Hotel has 35 elegantly furnished and air conditioned classic rooms, which will be a perfect pick both for business and leisure travelers…</p>
    </br></br></br></br>
      <div class="row gallery-images">
      <img class="col-1-of-3 image" src="img/hotel1.jpg"></img>
      <img class="col-1-of-3 image" src="img/img4.jpg"></img>
      <img class="col-1-of-3 image" src="img/hotel3.jpg"></img>
      <img class="col-1-of-3 image" src="img/img1.jpg"></img>
      <img class="col-1-of-3 image" src="img/img2.jpg"></img>
      <img class="col-1-of-3 image" src="img/img3.jpg"></img>
      </div>
      </div>
  <!-- WALID'S SECTION WALID'S SECTION WALID'S SECTION WALID'S SECTION WALID'S SECTION WALID'S SECTION -->
  <!-- ALI'S SECTION ALI'S SECTION ALI'S SECTION ALI'S SECTION ALI'S SECTION ALI'S SECTION ALI'S SECTION-->
  <section class="staff">
    <h2 class="u-center-text section-title">Our Team</h2></br></br>
    <h4 class="u-center-text section-description">Here are the best professionals in the hospitality business. We are proud that they are the part of our super <br/>friendly team.</h4>
    <br/><br/><br/><br/>
    <div class="display row">
      <div class="col-1-of-4 cards">
        <div class="circles first">
        </div>
        <br/><br/>
        <h3 class="staff-name">Ali Chaalan</h3>
        <h4 class="staff-description">Knows Obama</h4>
      </div>
      <div class="col-1-of-4 cards">
        <div class="circles second">
        </div>
        <br/><br/>
        <h3 class="staff-name">Farrah Abbas</h3>
        <h4 class="staff-description">Likes dan brown</h4>
      </div>
      <div class="col-1-of-4 cards">
        <div class="circles third">
        </div>
        <br/><br/>
        <h3 class="staff-name">Ibrahim Hussein</h3>
        <h4 class="staff-description">Knows everyone</br><small>(except Obama)</small></h4>
      </div>
      <div class="col-1-of-4 cards"><div class="circles fourth">
      </div>
      <br/><br/>
      <h3 class="staff-name">Walid Rifai</h3>
      <h4 class="staff-description">Tells lame jokes</h4>
    </div>
    </div>
  </section>

<!-- ALI'S SECTION ALI'S SECTION ALI'S SECTION ALI'S SECTION ALI'S SECTION ALI'S SECTION ALI'S SECTION-->

  <footer id="contactUsSection" class="footer">
    <?php include 'includes/footer.php'; ?>
  </footer>
