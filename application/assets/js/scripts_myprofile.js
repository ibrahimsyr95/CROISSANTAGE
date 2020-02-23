
            function goto(s){

window.location.replace(s);
}
$(document).ready(function () {
    $.ajax({
    url: "./getallTypeViennoiserie"
    , method: "post"         ,
    data:{ "csrf_token":$("#csrf_token").val()},
    success: function (result1) {
        result= JSON.parse(result1);
        result.forEach(function(val){
            $("#favorit").append("<option value='"+val.id+"'>"+val.name+"</option>");
        });

    }});
$.ajax({
    url: "./get_my_prfile"
    , method: "post"
    ,data:{ "csrf_token":$("#csrf_token").val()},
    success: function (result1) {

        result= JSON.parse(result1);

        $("#id").val(result[0].id);
        $("#fname").html(result[0].firstname);
        $("#lname").html(result[0].lastname);
        $("#surename").val(result[0].alias);
        $("#favorit").val(result[0].defaultPastry);
        


    }
});
$.ajax({
    url: "./get_Number_time_croissanted"
    , method: "post"
    ,data:{ "csrf_token":$("#csrf_token").val()},
    success: function (result1) {
        result= JSON.parse(result1);
        $("#ced").html(result[0].nb);
    }
});
$.ajax({
    url: "./get_Number_time_croissanter"
    , method: "post"
    ,data:{ "csrf_token":$("#csrf_token").val()},
    success: function (result1) {
        result= JSON.parse(result1);  
                $("#cer").html(result[0].nb);
    }
});


$("#btnSavemyprofil").click(function(){
    var donnees={
        "alias":$("#surename").val(),
    
        "defaultPastry":$("#favorit").val(),
        "pwd":$("#mdp").val()}
    $.ajax({
        
    url: "./update_my_profile"
    , method: "post"
    ,data: {donnees,"csrf_token":$("#csrf_token").val()},
    success: function (result) {
            console.log(result);
            if(result=="1"){
                $("#msg").append('<div class="alert alert-success"><strong>Success!</strong> Indicates a successful or positive action.</div>');

            }else{
                $("#msg").append('<div class="alert alert-danger"><strong>Success!</strong> Indicates a successful or positive action.</div>');
            }
            setTimeout(function(){
                    $(".alert").hide(1000);
                },"3000");
    }

});

});
var  ctxright = document.getElementById('myCharprofile');
$.ajax({
    url: "./get_Number_time_croissanted"
    , method: "post"
    ,data:{ "csrf_token":$("#csrf_token").val()},
    success: function (result1) {
        result= JSON.parse(result1);
    donnees=result[0].nb;
    
$.ajax({
    url: "./get_Number_time_croissanter"
    , method: "post"
    ,data:{ "csrf_token":$("#csrf_token").val()},
    success: function (result1) {
        result= JSON.parse(result1); 
        
    var char= new Chart(ctxright, {
type: 'pie',
data: {
    labels: ['CROISSANTED', 'CROISSANTEUR'],
    datasets: [{
        label: '# of Votes',
        data: [ donnees, result[0].nb],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)'
        ],
        borderWidth: 1
    }]
},
options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    }
}
});
    }
});
}
});
});
