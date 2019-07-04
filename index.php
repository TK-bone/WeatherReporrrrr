
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>WeatherReporrrrr</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

  <section>
    <div class="center">
      <h1>WeatherReporrrrr</h1>
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
    <canvas id="myBarChart"></canvas>
  </section>

</body>

<script src="//code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script src="js/function.js"></script>

