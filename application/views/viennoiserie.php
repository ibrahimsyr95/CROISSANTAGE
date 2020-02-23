<?php require('header.php'); ?>

<div class="container d-flex justify-content-center flex-wrap " id="VIENNOISERIE">
  <div class="card" style="width:18rem;" data-toggle="modal" data-target="#exampleModal">
    <img class="card-img-top" src="./application/images/add.png" width="100px" height="170px">
    <div class="card-body">
      <h5 class="card-title"><br> <br> </h5>

    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="label">Label</label>
            <input type="text" class="form-control" id="label" aria-describedby="emailHelp" placeholder="Enter label">
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="addcroissant">Add</button>
      </div>
    </div>
  </div>
</div>
</body>
<script>
  function goto(s) {

    window.location.replace(s);
  }

  $(document).ready(function() {

    $.ajax({
      url: "./getallTypeViennoiserie",
      method: "post",
           data:{ "csrf_token":$("#csrf_token").val()},
      success: function(result1) {
        result = JSON.parse(result1);
        result.forEach(function(val) {
          var isusable = "Disponible";
          var disponible = "Disponible";
          var i = 1;
          var j = 1;
          if (val.isAvailable == 0) {
            isusable = " Non Disponible";
            i = 0;
          } else {
            disponible = "Non disponible";
            j = 0;
          }
          $("#VIENNOISERIE").append('<div class="card" id="' + val.id + '" style="width:18rem;">  <img   class="card-img-top" src="https://source.unsplash.com/random/?croissant ' + val.id + '" width="100px" height="170px"><div class="card-body">     <h5 class="card-title">' + val.name + '</h5>              <select  class="custom-select available"  data-idVienn="' + val.id + '"> <option value="' + i + '">' + isusable + '</option><option value="' + j + '">' + disponible + '</option></select>              </div></div>');

        });

        $(".available").change(updateStatusPastry);
      }
    });

    function updateStatusPastry() {
     
        $.ajax({
          url: "./update_status_pastry",
          method: "post",
          data: {"donnees":{
            "isAvailable": $(this).val(),
            
            "id":  $(this).attr("data-idVienn")}
           ,"csrf_token":$("#csrf_token").val(),
           "id":  $(this).attr("data-idVienn")
          },
          success: function(result1) {
           // location.reload();
          }
       
      });
    }

  });
</script>

</html>