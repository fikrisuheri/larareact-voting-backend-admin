@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Akun Voting</h4>
                </div>
                <div class="card-body">
                    <span id="total-akun">Mengambil Data</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Akun Telah Digunakan</h4>
                </div>
                <div class="card-body">
                    <span id="total-akun-sudah-voting">Mengambil Data</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Akun Belum Di Gunakan</h4>
                </div>
                <div class="card-body">
                    <span id="total-akun-belum-voting">Mengambil Data</span>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Hasil Evoting</h4>
                <div class="card-header-action">
                    <a href="javascript:void(0)" id="btn-refresh" class="btn btn-primary">
                        Muat Ulang
                    </a>
                </div>
            </div>
            <div class="card-body">
                <canvas id="myChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(() => {
        getGrafik()
        getAkun()
        getAkunBelumVoting()
        getAkunSudahVoting()
    })

    const getGrafik = () => {
        $.getJSON("{{ route('hasil.ajax') }}",function(data){
            var label = [];
            var jumlah = [];
            $(data).each(function(i){
                label.push(data[i].name)
                jumlah.push(data[i].jumlah)
            })

            grafik(label,jumlah)
        })
    }
   
    const getAkun = () => {
        $.getJSON("{{ route('hasil.ajax.akun') }}",function(data){
            $('#total-akun').text(data.jumlah)
        })
    }

    const getAkunBelumVoting = () => {
        $.getJSON("{{ route('hasil.ajax.akunbelumvoting') }}",function(data){
            $('#total-akun-belum-voting').text(data.jumlah)
        })
    }

    const getAkunSudahVoting = () => {
        $.getJSON("{{ route('hasil.ajax.akunsudahvoting') }}",function(data){
            $('#total-akun-sudah-voting').text(data.jumlah)
        })
    }
    
    $('#btn-refresh').on('click',function(){
        $('#total-akun').text('Mengambil Data')
        $('#total-akun-belum-voting').text('Mengambil Data')
        $('#total-akun-sudah-voting').text('Mengambil Data')
        getGrafik()
        getAkun()
        getAkunBelumVoting()
        getAkunSudahVoting()
    })
    

    const grafik = (label,jumlah) => {
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: label,
            datasets: [{
                label: 'Hasil Perolehan Suara',
                data: jumlah,
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
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    }
</script>
@endsection