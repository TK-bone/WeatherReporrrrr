/*
* OpenWeatherMapAPI Request
*/
$('button#GetCanvas').click(function(){
  //HTMLの初期化処理
  $('.chart-container').html('<div class="chart-container" style="position: relative; width:90vw; height:50vh"><canvas id="myBarChart"></canvas></div>');
  var Place_val = $('[name=Place]').val().split(",");
  var API_KEY = Key_Make();
  var city = Place_val[0];
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
      Chart_Make(data,city,Place_val[1]);
    })
    .fail( (data) => {
      alert("ajax.php Communication failure");
    });
  })
  .fail(function(data) {
    alert("OpenWeatherMapAPI Communication failure");
  });

  /*
  * Key_Make
  * Simple key division processing
  * Probably not meaningful
  * @return string
  */
  function Key_Make(){
    let API_KEY_string = "";
    const API_KEY_array = new Array("0c71","63a59","26107","b5480","0ba7a","e8da730c");
    let Order = new Array(3,5,1,2,0,4);
    $(Order).each(function(index,num){
      API_KEY_string += API_KEY_array[num];
    })
    return API_KEY_string;
  }
});

/*
* Chartjs呼び出し
* @param array  data
* @param string city
* @param string color
*/
function Chart_Make(data,city,color){
  var ctx = document.getElementById("myBarChart");
  var myBarChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
      labels: data["dt_txt"],
      datasets: [
        {
          label: city+'の気温',
          data: data["temperature"],
          backgroundColor: color
        }
      ]
    },
    options: {
      //スマートフォンでChartが崩れるの修正
      maintainAspectRatio: false,
      scales: {
        xAxes: [{
          ticks: {
            suggestedMax: 40,
            suggestedMin: 0,
            stepSize: 5,
          }
        }]
      },
      layout: {
        padding: {
          left: 20,
          right: 20,
          top: 20,
          bottom: 20
        }
      }
    }
  });
}

