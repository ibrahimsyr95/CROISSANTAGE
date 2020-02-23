<?php require('header.php'); ?>
<div class="container d-flex justify-content-center flex-wrap " id="">


  <form class="  addctg ">
    <div id="msg"></div>
    <div class="form-inline">
      <div class="form-group">
        <label for="choice">Croissanteur</label>
        <select class="custom-select" id="cer">

        </select>

      </div>
      <div class="form-group">
        <label for="choice">Croissanted </label>
        <select class="custom-select" id="ced">

        </select>

      </div>
      <div  class="">
      <label for="choice">Deadline</label>
      <input type="date" id="dateDeadline" name="trip-start"
          
           class="form-control">
  </div>
  <div  class="">
      <label for="choice">date de commande </label>
      <input type="date" id="datecommandctg" name="trip-start"
       
          class="form-control">
  </div>
      <button type="button" class="btn btn-default mt-4" id="addCroissantage">Add</button>
    </div>
  </form>

</div>
<div class="container d-flex justify-content-center flex-wrap " id="ctg">


</div>
</body>
<script src="./application/assets/js/scripts_croissantage.js"></script>

</html>

</html>