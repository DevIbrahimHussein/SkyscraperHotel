<?php session_start(); ?>
<!DOCTYPE html>
<?php $_SESSION['web_Title'] = "Skyscraper --Home Page"; ?>
<?php include 'db.php' ?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css?ts=<?=time()?>" />
    <!-- <link href="css/style.css" type="text/css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase:700|Playfair+Display:900" rel="stylesheet">
    <title><?php echo $_SESSION['web_Title'] ; ?></title>
  </head>
  <body>
  <header class="header" id="header">
    <nav class="header__nav">
      <div class="header__nav__logo logo">
        <h3 class="header__nav__primary logo__primary">Skyscraper</h3>
        <h4 class="header__nav__secondary logo__secondary">Hotels</h4>
      </div>
        <?php include 'nav.php'; ?>
    </nav>
    <div class="text-box">
    <h4 class="text-box__pre">relax & rejuvenate</h4><br/>
    <h1 class="text-box__title">Where dreams <br/>come true</h1>
    <br/>
    <h5 class="text-box__post">Luxury space that you can't afford</h5>
    </div>
      <?php include 'popup.php' ?>
      </div>

    </header>
