
  function goto(s) {

    window.location.replace(s);
  }
  $(document).ready(function() {

    $.ajax({
      url: "./get_all_student",
      method: "post",
       data:{"csrf_token":$("#csrf_token").val()},
      success: function(result1) {
        result = JSON.parse(result1);
        result.forEach(function(val) {

          $("#cer").append('<option value="' + val.id + '"id="cer' + val.id + '">' + val.firstname + '  ' + val.lastname + '</option>');
          $("#ced").append('<option value="' + val.id + '"id="ced' + val.id + '"">' + val.firstname + '  ' + val.lastname + '</option>');
        });


      }
    });

    $.ajax({
      url: "./get_all_croissantages",
      method: "post", data:{"csrf_token":$("#csrf_token").val()}
      ,
      success: function(result1) {

        result = JSON.parse(result1);
        console.log(result);
        result.forEach(function(val) {
          details = JSON.parse(val.somme);
          detailshtml = "";
          details.forEach(function(valhtml) {
            detailshtml += valhtml.name + "  :  " + valhtml.nb + "<br>";
          });
        if (typeof val.idpastry === "undefined") {
            $("#ctg").append('<div class="card" id="#users" style="width:28rem;">  <img   class="card-img-top" src="https://source.unsplash.com/random/?sniper ' + val.id + '" width="200px" height="170px"><div class="card-body">     <h5 class="card-title">Croissanteur : ' + val.cername + " " + val.cerlast + '<br>Croissanteur :  ' + val.cedname + " " + val.cedlast + '<br>  ' + val.dateC + '</h5>   <div >' + val.deadline + '</div>           <p class="card-text">' + val.dateCommand + '</p>  <p class="card-text">' + detailshtml + '</p>   <div class="form-group">                      <label for="choice" class="alert alert-danger">this command has already finished </label>   </div>             </div></div>');
         
          } else {
            $("#ctg").append('<div class="card" id="#users" style="width:28rem;">  <img   class="card-img-top" src="https://source.unsplash.com/random/?sniper ' + val.id + '" width="200px" height="170px"><div class="card-body">     <h5 class="card-title">Croissanteur : ' + val.cername + " " + val.cerlast + '<br>Croissanteur :  ' + val.cedname + " " + val.cedlast + '<br>  ' + val.dateC + '</h5>   <div >' + val.deadline + '</div>           <p class="card-text">' + val.dateCommand + '</p>  <p class="card-text">' + detailshtml + '</p>   <div class="form-group">                      <label for="choice">your favorite choice </label>                        <select class="custom-select pastray" data-idCroissantage="'+val.idCroissantage+'">      <option value="' + val.idpastry + '"> ' + val.namepastry + '   </option>              </select>                    </div>             </div></div>');
         
          } 

        });

        $.ajax({
          url: "./getAvailableTypeViennoiserie",
          method: "post", 
          data:{"csrf_token":$("#csrf_token").val()},
          success: function(result1) {
            result = JSON.parse(result1);
            result.forEach(function(val) {

            
              $(".pastray").filter(function(index) {
                if($(this).val()!=val.id){
                    $(this).append("<option value='" + val.id + "'>" + val.name + "</option>");
                }
              })
            });

          }
        });
        $(".pastray").change(change_my_pastry);//mettre des ecouteurs
      }
    });
    /**
     */
    function change_my_pastry(){
      $.ajax({
          url: "./update_crrent_commande",
          method: "post",
          data:{ "pastryType":$(this).val(),
          "idCroissantage":  $(this).attr("data-idCroissantage"),
          "csrf_token":$("#csrf_token").val()},
          success: function(result1) {
           
          }
          });
    }
    $("#addCroissantage").click(function() {
      var croissantage = {"donnees":{
                                    "idCed": $("#ced").val(),
                                    "idCer": $("#cer").val(),
                                    "deadline": $("#dateDeadline").val(),
                                    "dateCommand": $("#datecommandctg").val()},
                          "csrf_token":$("#csrf_token").val()
                          };
      $.ajax({
        url: "./addCroissantage",
        method: "post",
        data: croissantage,
        success: function(result) {
          console.log(result);
          if (result == "true") {
            $("#msg").append('<div class="alert alert-success"><strong>Success!</strong> Indicates a successful or positive action.</div>');

          } else {
            $("#msg").append('<div class="alert alert-danger"><strong>Success!</strong> Indicates a successful or positive action.</div>');
          }
          setTimeout(function() {
            $(".alert").hide(1000);
            location.reload(); 
          }, "3000");
        }

      });

    });
    var elm = null;
    $("#ced").change(function() {
      if (elm != null) {
        $("#cer").append(elm);
      }
      var id = "#cer" + $(this).val();
      elm = $(id);
      $(id).remove();
    });

    var elm2 = null;
    $("#cer").change(function() {
      if (elm2 != null) {
        $("#ced").append(elm2);
      }
      var id = "#ced" + $(this).val();
      elm2 = $(id);
      $(id).remove();
    });
  });
