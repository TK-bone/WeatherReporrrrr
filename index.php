<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<title>WeatherReporrrrr</title>
<link href="//fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <section>
    <div class="center">
      <h1>WeatherReporrrrr</h1>
      <dl>
        <dt>概要</dt>
        <dd>freeWeatherAPIを使用して</dd>
        <dd>気温を中途半端に取得してくるアプリ</dd>
      </dl>

      <select name="Place">
        <option value="Tokyo,#00ced1">東京</option>
        <option value="Fukuoka,#6495ed">福岡</option>
        <option value="Nagoya,#66cdaa">名古屋</option>
        <option value="Osaka,#ff7f50">大阪</option>
      </select>
      <button id="GetCanvas">取得する</button>
    </div>
  </section>

  <section>
    <div class="chart-container" style="position: relative; width:90vw; height:50vh">
      <canvas id="myBarChart"></canvas>
    </div>
  </section>
</body>

<script src="//code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script src="js/function.js"></script>