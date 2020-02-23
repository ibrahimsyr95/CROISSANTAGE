
var ctx1 = document.getElementById('myChart1');
var ctx2 = document.getElementById('myChart2');
var ctx3 = document.getElementById('myChart3');





$(document).ready(function () {
    $.ajax({
    url: "./get_5best_croissanted"
    , method: "post"         ,
    data:{ "csrf_token":$("#csrf_token").val()},
    success: function (result1) {
        result= JSON.parse(result1);
        var i=0;
        dataC=[];
        labels=[];
        result.forEach(function(val){
            dataC[i]=val.nb;
            labels[i]=val.firstname+"  "+val.lastname;
            i++;
        });
        var myChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Best 5 croissanteur',
                    data: dataC,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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

$.ajax({
    url: "./get_percentage_items"
    , method: "post"         ,
    data:{ "csrf_token":$("#csrf_token").val()},
    success: function (result1) {
        result= JSON.parse(result1);
        var i=0;
        dataC=[];
        labels=[];
        result.forEach(function(val){
            dataC[i]=val.nb;
            labels[i]=val.name;
            console.log(val.name);
            i++;
        });
        var myChart3 = new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'percentage of items',
                    data: dataC,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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
$.ajax({
    url: "./croissantage_over_time"
    , method: "post"         ,
    data:{ "csrf_token":$("#csrf_token").val()},
    success: function (result1) {
        result= JSON.parse(result1);
        var i=0;
        dataC=[];
        labels=[];
        result.forEach(function(val){
            dataC[i]=val.nb;
            labels[i]=val.date;
            console.log(val.date);
            i++;
        });
        var myChart2 = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'croissantage over time',
                    data: dataC,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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

});


