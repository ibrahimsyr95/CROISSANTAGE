
$(document).ready(function() {

$.ajax({
  url: "./get_all_student",
  method: "post",
  data: {
    "csrf_token": $("#csrf_token").val()
  },
  success: function(result1) {
    result = JSON.parse(result1);
    result.forEach(function(val) {

  
      $("#users").append('<div class="card" id="'+val.id+'" style="width:18rem;">  <img   class="card-img-top" src="https://source.unsplash.com/random/?programmer ' + val.firstname + '" width="100px" height="170px"><div class="card-body">     <h5 class="card-title">' + val.firstname + '  ' + val.lastname + '</h5>              <p class="card-text"></p> <div class="d-flex justify-content-between flex-wrap"> <i class="fa fa-eye"></i><i class="fa fa-remove" data-id="'+val.id+'"></i><i class="fa fa-edit"  data-id="'+val.id+'"data-toggle="modal" data-target="#edit"></i></div>   </div></div>');

    });

    $(".fa-remove").click(deletestudent);
    $(".fa-edit").click(modifyprivileg);
  }
});

   function deletestudent() {
   
    $( "#"+$(this).attr("data-id") ).remove();
  
   $.ajax({
        url: "./deleteStudent",
        method: "post",
        data: {"csrf_token":$("#csrf_token").val(),
            "donnees":{"id": $(this).attr("data-id")}
            

        },
        success: function(result) {
            switch (result) {
                case 'true':
                    
                     location.replace("./");
                    break;
                default:
                    $("#form").prepend('<div class="alert alert-danger "><strong>Danger!</strong> Indicates a dangerous or potentially negative action.</div>');
                    setTimeout(function() {
                        $(".alert").hide(1000);
                    }, "3000");
                    // code block
            }
        }
    });
}
function modifyprivileg(){
  
    $("#idstudentToModifyPrivileg").val($(this).attr("data-id"));
    $.ajax({
        url: "./getrolestudent",
        method: "post",
        data: {"csrf_token":$("#csrf_token").val(),
            "donnees":{"idS": $("#idstudentToModifyPrivileg").val()}
        },
        success: function(result1) {
            result = JSON.parse(result1);
           $("#role").val(res.role);
        }
    });
   
}

$("#btn-saveRole").click(function(){
    $.ajax({
        url: "./updateRole",
        method: "post",
        data: {"csrf_token":$("#csrf_token").val(),
            "donnees":{"idS": $("#idstudentToModifyPrivileg").val(),
            "role":$("#role").val()}
        },
        success: function(result) {
           
        }
    });
});

});