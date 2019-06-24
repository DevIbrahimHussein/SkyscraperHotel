<form action="room.php?RoomID=<?php echo $roomID ?>" method="POST" onsubmit="this">
  <div class="form-group">
    <label for="InputArrival" class="col-form-label-lg"> ARRIVAL:*</label><br>
    <input type="date" class="form-control-plaintext" id="inputArrival" name="arrival" placeholder="dd/mm/yyyy" required>
  </div><br>
  <div class="form-group">
    <label for="InputDeparture" class="col-form-label-lg"> DEPARTURE:*</label><br>
    <input type="date" class="form-control-plaintext" id="inputDeparture" name="departure" placeholder="dd/mm/yyyy" required>
  </div><br>
  <div class="form-group">
    <label for="InputAdults" class="col-form-label-lg"> ADULTS:*</label><br>
    <select class="custom-select mr-sm-2" id="selectAdultsNb" name="adultNb">
        <option selected>1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
  </div><br>
  <div class="form-group">
    <label for="InputChildren" class="col-form-label-lg"> Children:*</label><br>  
    <select class="custom-select mr-sm-2" id="selectChildrenNb" name="childrenNb">
        <option selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
      </select>
  </div><br>
  <input type="checkbox" name="Breakfast_service" id="Breakfast_service" value="3">Breakfast
  <input type="checkbox" name="carRental_service" id="carRental_service" value="4">Car Rental
  <input type="checkbox" name="travelGuide_service" id="travelGuide_service" value="5">travel Guide
  <input type="checkbox" name="airportHotelTransportations_service" id="airportHotelTransportations_service" value="6">Airport Hotel Transportations
  <input type="checkbox" name="spaAndGym_service" id="spaAndGym_service" value="7">Spa and Gym <br>
  <input class="resButton" type="submit" name="book_room" value="Reserve Room"></input>
</form>
