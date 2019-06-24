<?php
    session_start();
    $_SESSION['web_Title'] = "Sign Up Now";
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="css/signup.css" rel="stylesheet" type="text/css">
    <title><?php echo $_SESSION['web_Title']; ?></title>
  </head>
  <body>
    <nav class="header__nav">
      <a href="index.php" style="text-decoration:none" class="header__nav__logo logo">
        <h3 class="header__nav__primary logo__primary">Skyscraper</h3>
        <h4 class="header__nav__secondary logo__secondary">Hotels</h4>
      </a>
        <?php include 'includes/nav.php'; ?>
    </nav>

    <div class="page-view">
        <div class="page-view__content">
        <div class="page-view__content-left">
          <div class="text-box">
          <h1 class="heading">Welcome aboard!</h1>
          <p class="sub-heading"><em>Feel the comfort of your own house</br>miles away from home</em></p>
          </div>
        </div>
        <div class="page-view__content-right">
          <div class="text-box">
            <h1 style="line-height: 3rem;"><span style="font-size: 2rem; text-transform: uppercase;">Discover</span><br/><span class="Poptext" style="font-size: 4rem;">Great Deals!</span></h1>
          </div>
          <?php include 'signupTable.php'; ?>
        </div>
        </div>
    </div>
    <footer class="footer">
      <?php include 'includes/footeroffooter.php'; ?>
    </footer>
  </body>
</html>
