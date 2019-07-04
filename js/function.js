/*
* OpenWeatherMapAPI通信用
*/

$(function() {
  var API_KEY = '20b7998fd086020b5654ed30e0e07018'
  var city = 'Tokyo';
  var url = '//api.openweathermap.org/data/2.5/forecast?q=' + city + ',jp&units=metric&APPID=' + API_KEY;
  $.ajax({
    url: url,
    dataType: "json",
    type: 'GET',
  })
  .done(function(data) {  
    $.ajax({
      url: "ajax.php",
      dataType: "json",
      type: 'post',
      data:{
        'json':data
      }
    })
    .done( (data) => {
      Chart_Make(data,city);
    })
    .fail( (data) => {
      alert("ajax.php通信失敗");
    });
  })
  .fail(function(data) {
    alert("API通信失敗");
  });
});

/*
* Chartjs呼び出し
* param (array,string)
*/

function Chart_Make(data,city){
  var ctx = document.getElementById("myBarChart");
  var myBarChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
      labels: data["dt_txt"],
      datasets: [
        {
          label: city+'の気温',
          data: data["temperature"],
          backgroundColor: "rgba(219,39,91,0.5)"
        }
      ]
    },
    options: {
      scales: {
        xAxes: [{
          ticks: {
            suggestedMax: 50,
            suggestedMin: 0,
            stepSize: 10,
          }
        }]
      },
      layout: {
        padding: {
          left: 20,
          right: 100,
          top: 20,
          bottom: 20
        }
      }
    }
  });
}
