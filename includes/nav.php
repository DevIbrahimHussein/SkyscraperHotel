  <ul class="navigation">

  <?php
      include 'navarray.php';
      include 'dropdownarray.php';

      foreach($navItems as $item => $itemValue){
        echo "<li class=\"navigation__item\">
                <a class=\"nav-links\" href=\"$itemValue\">$item</a>
              </li>
              ";
      }

      if(!isset($_SESSION['username'])){ // if user is not signed in
        echo "  <li class=\"navigation__item\"><span class=\"gradient\">
                  <a class=\"nav-links\" href=\"#popup\">Sign-in</a></span>
                </li>
            ";
      } else if($_SESSION['role']=='admin'){ // if user is already signed in
    ?>
          <?php
                foreach($adminDropDownMenu as $item => $itemValue){
                      echo "
                        <li class=\"navigation__item\"><a class=\"nav-links\" href =\"$itemValue\">$item</a></li>
                          ";
                }
            ?>
          <?php
      }else if($_SESSION['role']=='subscriber'){ // if user is already signed in
    ?>
          <?php
                foreach($userDropDownMenu as $item => $itemValue){
                      echo "
                        <li class=\"navigation__item\"><a class=\"nav-links\" href =\"$itemValue\">$item</a></li>
                          ";
                }
            ?>
          <?php
      }
?>
</ul>
