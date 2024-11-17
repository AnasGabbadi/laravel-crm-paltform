@extends('layouts.app')

@section('contents')
  <!-- Content Row -->

  <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Product</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProducts }} Product</div>
                        </div>
                        <div class="col-auto">
                            <img src="{{ asset('assets_dashboard/img/production.png') }}" alt="" style="width: 54px;margin-top: -4px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Stock</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"> Stock</div>
                            </div>
                            <div class="col-auto">
                                <img src="{{ asset('assets_dashboard/img/gestion-de-linventaire.png') }}" alt="" style="width: 54px;margin-top: -4px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Oder</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalOrders }} Order</div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-auto">
                            <img src="{{ asset('assets_dashboard/img/sac-de-courses.png') }}" alt="" style="width: 54px;margin-top: -4px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total User</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }} User</div>
                        </div>
                        <div class="col-auto">
                            <img src="{{ asset('assets_dashboard/img/homme-daffaire.png') }}" alt="" style="width: 54px;margin-top: -4px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div style="width: auto;margin-left: 1086px;margin-top: -35px;margin-bottom: 15px;">
            <input class="form-control" id="dateInput" name="date" type="date" value="2024-04-06">
        </div>
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Reports</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart" style="height:300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Analytics</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart" style="height: 323px;"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Order
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Confirmed
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Deliverd
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        @if(Session::has('success'))
            <div class="alter alter-success" role="alter">
                {{Session::get('success')}}
            </div>
        @endif
        <h6 class="m-0 font-weight-bold text-primary">Recent Orders</h6>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>    
                            <th>#</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Total Order</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Total Order</th>
                            <th>Total Amount</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($products->count()>0)
                        <input type="hidden" value="{{$totalOrdersProduct = 0}}">
                        <input type="hidden" value="{{$productOrders = 0}}">
                        <input type="hidden" value="{{$productTotalQuantity = 0}}">
                            @foreach($products as $rs)
                                @foreach ($orders as $order)
                                    @if ($order->barcode === $rs->barcode)
                                        @if ($order->condition === "Delivered") 
                                            <input type="hidden" value="{{$productOrders++}}">
                                        @endif
                                    @endif
                                @endforeach
                                @foreach ($orders as $order)
                                    @if ($order->barcode === $rs->barcode)
                                        @if ($order->condition === "Delivered") 
                                            <input type="hidden" value="{{$productTotalQuantity += $order->quantity}}">
                                        @endif
                                    @endif
                                @endforeach
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <img src="{{ $rs->photo }}" style="max-width: 55px;">
                                        {{$rs->title}}  
                                    </td>
                                    <td>{{$rs->price}} DH</td>
                                    <td>
                                        {{$totalOrdersProduct += $productOrders}}
                                    </td>
                                    <td>{{$rs->price * $productTotalQuantity}} DH</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>  
    </div>

@endsection
@section('scripts')
<script>
 // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

function updateChart(date) {
    // Filtrer les données en fonction de la date sélectionnée
    var filteredData = {!! json_encode($deliveredOrderList->where('updated_at', '>=', "' + date + '")->where('updated_at', '<=', "' + date + '")->groupBy(function($order) { return Carbon::parse($order->updated_at)->format('H:i'); })) !!};
    
    var times = [];
    var orderCount = [];
    
    // Convertir les données filtrées en format utilisable pour le graphique
    Object.entries(filteredData).forEach(([time, values]) => {
        times.push(time);
        orderCount.push(values.length);
    });
    
    // Mettre à jour les données du graphique
    myLineChart.data.labels = times;
    myLineChart.data.datasets[0].data = orderCount;
    
    // Mettre à jour le graphique
    myLineChart.update();
}

// Obtenir l'élément de saisie de date
var dateInput = document.getElementById('dateInput');

// Ajouter un événement de changement à l'élément de saisie de date
dateInput.addEventListener('change', function() {
    // Obtenir la valeur de la date sélectionnée
    var selectedDate = this.value;
    
    // Mettre à jour le graphique en fonction de la date sélectionnée
    updateChart(selectedDate);
});
// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var _ydata = JSON.parse('{!! json_encode($times) !!}');
var _xdata = JSON.parse('{!! json_encode($orderCount) !!}');

var myLineChart = new Chart(ctx, {
type: 'line',
data: {
    labels: _ydata,
    datasets: [{
    label: "Sessions",
    lineTension: 0.3,
    backgroundColor: "#ffffff00",
    borderColor: "#3d004ad9",
    pointRadius: 5,
    pointBackgroundColor: "#3d004ad9",
    pointBorderColor: "rgba(255,255,255,0.8)",
    pointHoverRadius: 5,
    pointHoverBackgroundColor: "#3d004ad9",
    pointHitRadius: 50,
    pointBorderWidth: 2,
    data: _xdata,
    }],
},
options: {
    scales: {
    xAxes: [{
        time: {
        unit: 'date'
        },
        gridLines: {
        display: false
        },
        ticks: {
        maxTicksLimit: 7
        }
    }],
    yAxes: [{
        ticks: {
 
        maxTicksLimit: 10
        },
        gridLines: {
        color: "rgba(0, 0, 0, .125)",
        }
    }],
    },
    legend: {
    display: false
    }
}
});
</script> 
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
      data: [{{$totalOrders}}, {{$confirmdOrders}}, {{$deliveredOrders}}],
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
</script>
@endsection

