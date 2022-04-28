<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{env('APP_NAME') ?? 'Page title'}}</title>
  <!-- Styles -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@700&display=swap" rel="stylesheet">
  <!-- font -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- scripts -->
  <script src="{{ asset('js/app.js') }}"></script>
</head>
<body class="background">
  <header>
    <img class="logo" src="img/logo.png" alt="">
    <div class="email"> </div>
    <div class="ig"> </div>
    <div class="behance"> </div>



  </header>
  <nav class="meniu">
    <ul>
      <li style="padding-top: 13%"><u>Album 1</u></li>
      <li><u>Album 2</u></li>
      <li><u>Album 3</u></li>
      <li><u>Album 4</u></li>
      <li> </li>
      <li> </li>
      <li> </li>

    </ul>


  </nav>
  <footer>
    <p>Tom Rinke</p>
    <p>Photography</p>

  </footer>
</body>
</html>
