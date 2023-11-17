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
          <canvas id="myChart" width="400" height="200"></canvas>
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