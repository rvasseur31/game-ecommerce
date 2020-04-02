<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Evaluation CRUD</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-primary text-light">
    <a class="navbar-brand" style="decoration:none">Crud avis</a>
    </nav>

<br>

  <div class="container">
    <br>
    <button type="button" class="btn btn-primary" href="{{url('avis')}}">Accueil</button>
    @yield('main')
  </div>
</body>
</html>