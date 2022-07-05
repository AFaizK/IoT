@extends('layouts.main')
<style>
    .none{
        display: none;
    }
</style>
@section('home')

<select name="data_sensor_id" id="select_wilayah" onchange="enableBrand(this)" class="dropdown m-5">
    <option disabled value selected="selected" id="dd"> -- Pilih Wilayah -- </option>
    @foreach ( $wilayah as $data )
        <option  value="{{ $data->wilayah }}">{{ $data->wilayah }}</option>
    @endforeach
</select>
<section class="none" id="malang">
  <div class="card m-4 none" id="malang">
    Sensor Wilayah malang
    <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
        </li>
        <li class="nav-item">
        <a class="nav-link"  href="#harian" role="tab" aria-controls="harian" aria-selected="false">Chart Harian</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#bulanan" role="tab" aria-controls="bulanan" aria-selected="false">Chart Bulanan</a>
        </li>
    </ul>
    </div>
    <div class="card-body">


        <div class="tab-content mt-3">
        <div class="tab-pane active" id="description" role="tabpanel">
        <article class="justify">
            {!! $deskripsi->deskripsi !!}
        </article>

        </div>

        <div class="tab-pane" id="harian" role="tabpanel" aria-labelledby="harian-tab">
        <div class="row">
            <div class="col-lg-6">
                <canvas  class="rounded-3 " id="linechart" ></canvas>
            </div>
            <div class="card-body all-icons col-lg-6 ">
                <div class="row">
                    <table class="table ">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Hari</th>
                            <th>Kadar</th>
                            <th class="text-right" style="text-align-last: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $CO as $data )
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->day_name }}</td>
                            <td>{{ $data->count }}</td>
                            <td class="td-actions text-right" style="text-align-last: center;">
                                <a ><button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                    <img src="gambar/pencil-square.svg" alt="" srcset="">
                                </button></a>
                                <a><button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm">
                                    <img src="gambar/trash.svg" alt="" srcset="">
                                </button></a>
                            </td>
                            </tr>
                        @endforeach

                    </tbody>
                    </table>
                    <div class="export">
                    <a href="/exportco"><button type="button" class="btn btn-success float-end btn-icon btn-sm">
                    EXPORT TABEL
                    </button></a>
                    </div>
                </div>
                </div>

        </div>
        </div>

        <div class="tab-pane " id="bulanan" role="tabpanel" aria-labelledby="bulanan-tab">
        <div class="row">
            <div class="col-6">
                <canvas  class="rounded-3 " id="linechartbulanan" ></canvas>
                </div>
            <div class="card-body all-icons col-6 ">
                <div class="row">
                    <table class="table ">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Bulan</th>
                            <th>Kadar</th>
                            <th class="text-right" style="text-align-last: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $CO_bulanan as $data )
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->month_name }}</td>
                            <td>{{ $data->count }}</td>
                            <td class="td-actions text-right" style="text-align-last: center;">
                                <a ><button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                    <img src="gambar/pencil-square.svg" alt="" srcset="">
                                </button></a>
                                <a><button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm">
                                    <img src="gambar/trash.svg" alt="" srcset="">
                                </button></a>
                            </td>
                            </tr>
                        @endforeach

                    </tbody>
                    </table>
                    <div class="export">
                    <a href="/exportco_bulanan"><button type="button" class="btn btn-success float-end btn-icon btn-sm">
                    EXPORT TABEL
                    </button></a>
                    </div>
                </div>
                </div>

        </div>
    </div>
        </div>
    </div>
    </div>
</section>

<section class="none" id="surabaya">
<div class="card m-4">
    <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
        <li class="nav-item">
        <a class="nav-link active" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
        </li>
        <li class="nav-item">
        <a class="nav-link"  href="#harian_kode2" role="tab" aria-controls="harian_kode2" aria-selected="false">Chart Harian</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#bulanan_kode2" role="tab" aria-controls="bulanan_kode2" aria-selected="false">Chart Bulanan</a>
        </li>
    </ul>
    </div>
    <div class="card-body">

        <div class="tab-content mt-3">
        <div class="tab-pane active" id="description" role="tabpanel">
        <article class="justify">
            {!! $deskripsi->deskripsi !!}
        </article>

        </div>

        <div class="tab-pane" id="harian_kode2" role="tabpanel" aria-labelledby="harian_kode2-tab">
        <div class="row">
            <div class="col-lg-6">
                <canvas  class="rounded-3 " id="linechart_kode2" ></canvas>
            </div>
            <div class="card-body all-icons col-lg-6 ">
                <div class="row">
                    <table class="table ">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Hari</th>
                            <th>Kadar</th>
                            <th class="text-right" style="text-align-last: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $CO_kode2 as $data )
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->day_name }}</td>
                            <td>{{ $data->count }}</td>
                            <td class="td-actions text-right" style="text-align-last: center;">
                                <a ><button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                    <img src="gambar/pencil-square.svg" alt="" srcset="">
                                </button></a>
                                <a><button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm">
                                    <img src="gambar/trash.svg" alt="" srcset="">
                                </button></a>
                            </td>
                            </tr>
                        @endforeach

                    </tbody>
                    </table>
                    <div class="export">
                    <a href="/exportco_"><button type="button" class="btn btn-success float-end btn-icon btn-sm">
                    EXPORT TABEL
                    </button></a>
                    </div>
                </div>
                </div>

        </div>
        </div>

        <div class="tab-pane " id="bulanan_kode2" role="tabpanel" aria-labelledby="bulanan_kode2-tab">
        <div class="row">
            <div class="col-6">
                <canvas  class="rounded-3 " id="linechartbulanan_kode2" ></canvas>
                </div>
            <div class="card-body all-icons col-6 ">
                <div class="row">
                    <table class="table ">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Bulan</th>
                            <th>Kadar</th>
                            <th class="text-right" style="text-align-last: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $CO_bulanan_kode2 as $data )
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $data->month_name }}</td>
                            <td>{{ $data->count }}</td>
                            <td class="td-actions text-right" style="text-align-last: center;">
                                <a ><button type="button" rel="tooltip" class="btn btn-success btn-link btn-icon btn-sm">
                                    <img src="gambar/pencil-square.svg" alt="" srcset="">
                                </button></a>
                                <a><button type="button" rel="tooltip" class="btn btn-danger btn-link btn-icon btn-sm">
                                    <img src="gambar/trash.svg" alt="" srcset="">
                                </button></a>
                            </td>
                            </tr>
                        @endforeach

                    </tbody>
                    </table>
                    <div class="export">
                    <a href="/exportco_bulanan_"><button type="button" class="btn btn-success float-end btn-icon btn-sm">
                    EXPORT TABEL
                    </button></a>
                    </div>
                </div>
                </div>

        </div>
    </div>
        </div>
    </div>
</div>
</section>





@endsection

@section('js')
<script type="text/javascript">

$('#bologna-list a').on('click', function (e) {
e.preventDefault()
$(this).tab('show')
})
// dropdown
document.getElementById('malang').classList.remove('none');
function enableBrand(answer){
if(answer.value == 'malang'){
    document.getElementById('surabaya').classList.add('none');
    document.getElementById('malang').classList.remove('none');
}else if(answer.value == 'surabaya'){
    document.getElementById('surabaya').classList.remove('none');
    document.getElementById('malang').classList.add('none');
}
console.log(answer.value);
}


    //   $(function(){

          //get the pie chart canvas
const cData = JSON.parse(`<?php echo $chart_data; ?>`);
const cData2 = JSON.parse(`<?php echo $chart_data_bulan; ?>`);


var ctx = $("#linechart");
var ctx2 = $("#linechartbulanan");

var data = {
labels: cData.label,
datasets: [
    {
    label: "Kadar CO" ,
    data: cData.data,
    backgroundColor:"rgba(158, 118, 80, 0.288)",
    backgroundColor:"rgba(127, 155, 233, 0.1)",
    borderColor: "rgba(127, 155, 233, 0.726)",
    borderWidth: 2,
    hoverBackgroundColor: "rgba(127, 155, 233, 0.3)",
    hoverBorderColor: "rgba(127, 155, 233, 0.726)",
    }
]
};
var data2 = {
labels: cData2.label,
datasets: [
    {
    label: "Kadar CO" ,
    data: cData2.data,
    backgroundColor:"rgba(158, 118, 80, 0.288)",
    backgroundColor:"rgba(127, 155, 233, 0.1)",
    borderColor: "rgba(127, 155, 233, 0.726)",
    borderWidth: 2,
    hoverBackgroundColor: "rgba(127, 155, 233, 0.3)",
    hoverBorderColor: "rgba(127, 155, 233, 0.726)",
    }
]
};

//options
var options = {
    scales: {
      y: {
        display: true,
        title: {
          display: true,
          text: 'ppm',
          color: '#911',
          font: {
            family: 'Comic Sans MS',
            size: 20,
            weight: 'bold',
            lineHeight: 1.2,
          },
          padding: {top: 20, left: 0, right: 0, bottom: 0}
        },
        stacked: true,
        grid: {
          display: true,
          color: "rgba(255,99,132,0.2)"
        }
      },
      x: {
        display: true,
        title: {
          display: true,
          text: 'week',
          color: '#911',
          font: {
            family: 'Comic Sans MS',
            size: 20,
            weight: 'bold',
            lineHeight: 1.2,
          },
          padding: {top: 20, left: 0, right: 0, bottom: 0}
        },
        grid: {
          display: false
        }
      }
    },
    plugins: {
        title: {
            display: true,
            text: 'Kadar CO',
            font: {
            family: 'Comic Sans MS',
            size: 25,
            weight: 'bold',
            lineHeight: 1.2,
          },
          padding: {top: 0, left: 0, right: 0, bottom: 20}
        },
        legend:{
          display: false,
        }
    }
  };

//create Pie Chart class object
var chart1 = new Chart(ctx, {
type: "bar",
data: data,
options: options
});
var chart2 = new Chart(ctx2, {
type: "bar",
data: data2,
options: options
});


// kode 2
var cData_kode2 = JSON.parse(`<?php echo $chart_data_kode2; ?>`);
var cData2_kode2 = JSON.parse(`<?php echo $chart_data_bulan_kode2; ?>`);


var ctx_kode2 = $("#linechart_kode2");
var ctx2_kode2 = $("#linechartbulanan_kode2");

var data_kode2 = {
labels: cData_kode2.label,
datasets: [
    {
    label: "Kadar CO" ,
    data: cData_kode2.data,
    backgroundColor:"rgba(158, 118, 80, 0.288)",
    backgroundColor:"rgba(127, 155, 233, 0.1)",
    borderColor: "rgba(127, 155, 233, 0.726)",
    borderWidth: 2,
    hoverBackgroundColor: "rgba(127, 155, 233, 0.3)",
    hoverBorderColor: "rgba(127, 155, 233, 0.726)",
    }
]
};
var data2_kode2 = {
labels: cData2_kode2.label,
datasets: [
    {
    label: "Kadar CO" ,
    data: cData2_kode2.data,
    backgroundColor:"rgba(158, 118, 80, 0.288)",
    backgroundColor:"rgba(127, 155, 233, 0.1)",
    borderColor: "rgba(127, 155, 233, 0.726)",
    borderWidth: 2,
    hoverBackgroundColor: "rgba(127, 155, 233, 0.3)",
    hoverBorderColor: "rgba(127, 155, 233, 0.726)",
    }
]
};

//options
var options = {
    scales: {
      y: {
        display: true,
        title: {
          display: true,
          text: 'ppm',
          color: '#911',
          font: {
            family: 'Comic Sans MS',
            size: 20,
            weight: 'bold',
            lineHeight: 1.2,
          },
          padding: {top: 20, left: 0, right: 0, bottom: 0}
        },
        stacked: true,
        grid: {
          display: true,
          color: "rgba(255,99,132,0.2)"
        }
      },
      x: {
        display: true,
        title: {
          display: true,
          text: 'month',
          color: '#911',
          font: {
            family: 'Comic Sans MS',
            size: 20,
            weight: 'bold',
            lineHeight: 1.2,
          },
          padding: {top: 20, left: 0, right: 0, bottom: 0}
        },
        grid: {
          display: false
        }
      }
    },
    plugins: {
        title: {
            display: true,
            text: 'Kadar CO',
            font: {
            family: 'Comic Sans MS',
            size: 25,
            weight: 'bold',
            lineHeight: 1.2,
          },
          padding: {top: 0, left: 0, right: 0, bottom: 20}
        },
        legend:{
          display: false,
        }
    }
  };

//create Pie Chart class object
var chart = new Chart(ctx_kode2, {
type: "bar",
data: data_kode2,
options: options
});
var chart = new Chart(ctx2_kode2, {
type: "bar",
data: data2_kode2,
options: options
});

    //   });
</script>
@endsection
