@extends('layouts.app')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Product List</h1>
    <a href="{{route('products.create')}}" class="btn btn-primary" onclick="handleAddUserClick()"><img src="{{ asset('assets_dashboard/img/p2.png') }}" alt="" style="width: 15px;margin-right: 8px;margin-top: -4px;">Add User</a>
</div>
<br><br>
@if(Session::has('success'))
    <div class="alter alter-success" role="alter">
        {{Session::get('success')}}
    </div>
@endif
<!--<div class="row">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="chart-container">
                <canvas id="productChart"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="productChart2">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="chart-container">
                <canvas id="productChart2"></canvas>
            </div>
        </div>
    </div>
</div>-->
<br><br>
<div style="margin-left: -600px;
                    margin-top: -60px;
                    display: flex;
                    justify-content: flex-end;">
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart" style="height: 179px;"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Order
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Confirmed
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-info"></i> Delivered
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="margin-top: -345px;">
    <div class="col-lg-6 mb-4">
        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">In Progress <span
                        class="float-right">{{1 * 10}}%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: {{1 * 10}}%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Delivered <span
                        class="float-right">{{10 * 10}}%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{10 * 10}}%"
                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Canceled <span
                        class="float-right">{{1 * 10}}%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: {{1 * 10}}%"
                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Confirm <span
                        class="float-right">{{10* 10}}%</span></h4>
                <div class="progress mb-4">
                <div class="progress-bar bg-warning" role="progressbar" style="width: {{10 * 10}}%"
                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-body" style="">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>barcode</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Photo</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>barcode</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @if($products->count()>0)
                    @foreach($products as $rs)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><img src="{{ $rs->photo }}" style="max-width: 100px;"></td>
                            <td>{{$rs->title}}</td>
                            <td>{{$rs->price}}</td>
                            <td>{{$rs->quantity}}</td>
                            <td>{{$rs->barcode}}</td>
                            <td>
                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li><a class="dropdown-item" href="{{ route('products.edit', $rs->id) }}" type="button">Edit</a></li>
                                        <li>
                                            <form class="btn p-0" action="{{ route('products.destroy', $rs->id) }}" method="POST" type="button" onsubmit="return confirm('Delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button style="border: none; background-color: white;">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scriptsProducts')
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Order", "Confirmed", "Deliverd"],
    datasets: [{
      data: [11, 11, 11],
      backgroundColor: ['#470057', '#620277d9', '#cb00f8d9'],
      hoverBackgroundColor: ['#470057', '#620277d9', '#cb00f8d9'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
new Chart(ctx2, config2);
</script>
<!--<script>
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var ctx = document.getElementById("myPieChartP");
var myPieChartP = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Order", "Confirmed", "Delivered"], 
    datasets: [{
      data: [30, 40, 50], 
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

const ctx2 = document.getElementById('productChart').getContext('2d');
const data2 = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
    datasets: [{
        data: [10, 15, 20, 18, 25, 22],
        borderWidth: 4,
        borderColor: 'rgba(0, 0, 0, 1)', // Définir la couleur de la bordure pour la courbe
        backgroundColor: 'rgba(0, 0, 0, 0)', // Définir la couleur de fond comme transparente
    }]
};
const config2 = {
    type: 'line',
    data: data2,
    options: {
        scales: {
            x: { // Ajuster les options de l'axe des x
                display: false, // Masquer l'axe des x
            },
            y: { // Ajuster les options de l'axe des y
                display: false, // Masquer l'axe des y
            },
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
};

const ctx3 = document.getElementById('productChart2').getContext('2d');
const data3 = {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
    datasets: [{
        data: [10, 15, 20, 18, 25, 22],
        borderWidth: 4,
        borderColor: 'rgba(0, 0, 0, 1)', // Définir la couleur de la bordure pour la courbe
        backgroundColor: 'rgba(0, 0, 0, 0)', // Définir la couleur de fond comme transparente
    }]
};
const config3 = {
    type: 'line',
    data: data3,
    options: {
        scales: {
            x: { // Ajuster les options de l'axe des x
                display: false, // Masquer l'axe des x
            },
            y: { // Ajuster les options de l'axe des y
                display: false, // Masquer l'axe des y
            },
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
};

new Chart(ctx2, config2);
new Chart(ctx3, config3);
</script>-->
@endsection
