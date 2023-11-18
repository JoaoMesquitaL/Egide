@extends('layouts.layout')
@section('content')
<!-- BREADSCRUMBS -->


<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-chevron p-3 bg-body-tertiary rounded-3">
    <li class="breadcrumb-item">
      <a class="link-body-emphasis" href="#">
        <i class="bi bi-house-door-fill"></i>
        <span class="visually-hidden">Home</span>
      </a>
    </li>
    <li class="breadcrumb-item">
      <a class="link-body-emphasis fw-semibold text-decoration-none" href="#">Relatórios</a>
    </li>

  </ol>
</nav>
<!---->

<!-- ERROR MESSAGES -->
<div class="page-content">

  <button class="btn btn-success" style="margin-left: 20px;">Gerar relatório</button>


  <div class="cards">
    <div class="card">
      <div class="card-content">
        <div class="number">{{ $products }}</div>
        <div class="card-name">Produtos cadastrados</div>
      </div>
      <div class="icon-box">
        <i class="bi bi-inboxes"></i>
      </div>
    </div>

    <div class="card">
      <div class="card-content">
        <div class="number">42</div>
        <div class="card-name">Usuários cadastrados</div>
      </div>
      <div class="icon-box">
        <i class="bi bi-people"></i>
      </div>
      <a href="{{ url('admin/index-users') }}">Mais informações <i class="bi bi-arrow-right"></i></a>
    </div>

    <div class="card">
      <div class="card-content">
        <div class="number">42</div>
        <div class="card-name">Vendas registradas</div>
      </div>
      <div class="icon-box">
        <i class="bi bi-cart-check"></i>
      </div>
    </div>

    <div class="card">
      <div class="card-content">
        <div class="number">42</div>
        <div class="card-name">Ganhos totais</div>
      </div>
      <div class="icon-box">
        <i class="bi bi-currency-dollar"></i>
      </div>
    </div>

  </div>

  <div class="row container ">
    <section class="graficos col s12 m6" >            
      <div class="grafico card z-depth-4">
          <h5 class="center"> Aquisição de usuários</h5>
              <canvas id="myChart" width="400" height="150"></canvas>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const ctx = document.getElementById('myChart');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
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
                }
            });
        }, true);
    </script>
      </div>           
    </section> 
    
    <section class="graficos col s12 m6">            
        <div class="grafico card z-depth-4">
            <h5 class="center"> Produtos </h5>
        <canvas id="myChart2" width="400" height="200"></canvas> 
    </div>            
   </section>             
</div>


  <!--<div class="charts">

    <div class="chart doughnut-chart">
        <h2>Employees</h2>
        <div>
            <canvas id="doughnut"></canvas>
        </div>
    </div>-->










  </body>

  </html>

  @endsection

  @push('graph')
  <script>

  </script>

  @endpush