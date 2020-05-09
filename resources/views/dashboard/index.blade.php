@extends('layouts.admin')

@section('content')
      <canvas id="myChart"></canvas>


      <div class="container-info">
          <h1>Informations principales</h1>
        <div class="row">
            <div class="col-lg-3 mb-4">
                <div class="card bg-dark text-white shadow">
                  <div class="card-body text-uppercase">
                    <h1 style="float:left ">Membres </h1>
                    <h1 class="text-white-40" style="float:right"><i class="fa fa-user" aria-hidden="true"></i>{{$usersTotal}}</h1>
                  </div>
                </div>
              </div>
              
              <div class="col-lg-3 mb-4">
                <div class="card bg-danger text-white shadow">
                  <div class="card-body text-uppercase">
                    <h1 style="float:left">Ventes </h1>
                    <h1 class="text-white-40" style="float:right"><br><i class="fa fa-gamepad" aria-hidden="true"></i>{{$gamesbuyTotal}}</h1>
                  </div>
                </div>
              </div>
        
        
              <div class="col-lg-3 mb-4">
                <div class="card bg-success text-white shadow">
                  <div class="card-body text-uppercase">
                    <h1 style="float:left ">Revenus Total </h1>
                    <h1 class="text-white-40" style="float:right"><i class="fa fa-credit-card" aria-hidden="true"></i>{{$revenueTotal}}</h1>
                  </div>
                </div>
              </div>
        
              <div class="col-lg-3 mb-4">
                <div class="card bg-primary text-white shadow">
                  <div class="card-body text-uppercase">
                      <h1 style="float:left;">Revenus 7 derniers jours</h1>
                    <h1 class="text-white-40" style="float:right"><i class="fas fa-shield-alt"></i> <span id="pvFrance"><i class="fas fa-spinner fa-pulse"></i></span></h1>
                  </div>
                </div>
              </div>
        </div>
      </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
           var chart = new Chart(ctx, {
               // The type of chart we want to create
               type: 'line',
           
               // The data for our dataset
               data: {
                   labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                   datasets: [{
                       label: 'My First dataset',
                       backgroundColor: 'rgb(255, 99, 132)',
                       borderColor: 'rgb(255, 99, 132)',
                       data: [0, 10, 5, 2, 20, 30, 45]
                   }]
               },
           
               // Configuration options go here
               options: {}
           });
           </script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      
    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"  crossorigin="anonymous"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script>
@endsection