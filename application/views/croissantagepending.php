<?php require('header.php'); ?>
<div class="container d-flex justify-content-center flex-wrap " id="">




</div>

<div class="container d-flex justify-content-center flex-wrap " id="ctg">


</div>
</body>
<script>
  function goto(s) {

    window.location.replace(s);
  }
  $(document).ready(function() {
    console.log($("#csrf_token").val());
   

    $.ajax({
      url: "./get_all_croissantages_pending",
      method: "post",  
      data:{"csrf_token":$("#csrf_token").val()}
      ,
      success: function(result1) {

        result = JSON.parse(result1);
        console.log(result);
        result.forEach(function(val) {
       
         
          $("#ctg").append('<div class="card" id="#users" style="width:28rem;">  <img   class="card-img-top" src="https://source.unsplash.com/random/?sniper ' + val.id + '" width="200px" height="170px"><div class="card-body">     <h5 class="card-title">Croissanteur : ' + val.cername + " " + val.cerlast + '<br>Croissanteur :  ' + val.cedname + " " + val.cedlast + '<br>  ' + val.dateC + '</h5>   <div >' + val.deadline + '</div>           <p class="card-text">' + val.dateCommand + '</p>  <p class="card-text"></p> <div> <button type="button"  class="btn btn-primary mb-2" data-idCroissantage="'+val.id+'">Confirm </button>  <button type="button" data-idCroissantage="'+val.id+'" class="btn btn-danger mb-2">Reject</button>                   </div>             </div></div>');


        });
        $(".btn-danger").click(rejectCroissantage);
        $(".btn-primary").click(confirmCroissantage);
       }
    });
    /**
     */
     function rejectCroissantage(){
        $.ajax({
      url: "./rejectCroissantage",
      method: "post",
      data:{"id":$(this).attr("data-idCroissantage"),"csrf_token":$("#csrf_token").val()},
      success: function(result1) {
        location.reload();
      }
      });
     }
     function confirmCroissantage(){
        $.ajax({
      url: "./confirmCroissantage",
      method: "post",
      data:{"id":$(this).attr("data-idCroissantage"),"csrf_token":$("#csrf_token").val()},
      success: function(result1) {
        location.reload();
      }
      });
    
        }
 
  });
</script>

</html>