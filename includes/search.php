<form class="" action="searchProcess.php" method="post">
<div class="searchRoomBar">
  <div class="searchBarRegulator">
  <div class="search-form">
    <img class="searchIcon" src="img/search.png"></img>
    <input id="searchInput" class="search-form_entries" type="text" name="search" placeholder="Search for a hotel or destination"></input>
  </div>
  <div class="search-param">
    <img class="searchIcon" src="img/calendar.png"></img>
    <input class="search-form_entries date-entries" type="text" placeholder="Check In" name="checkIn" onfocus="(this.type='date')"></input>
    <img class="searchIcon" src="img/calendar.png"></img>
    <input class="search-form_entries date-entries" type="text" placeholder="Check Out" name="checkOut" onfocus="(this.type='date')"></input>
    <input class="search-form_entries adult-entries" type="number" placeholder="Adults" name="Adult" min="1" max="100"></input>
    <input class="search-form_entries children-entries" type="number" placeholder="Children" name="Children" min="0" max="100" ></input>
  </div>
</div>
  <a class="submitSearch" href="filters/index.php" type="submit" value="Submit">Search</a>
</div>
</form>
