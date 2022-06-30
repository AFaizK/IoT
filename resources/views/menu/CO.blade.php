@extends('layouts.main')

@section('home')



                    <div class="card m-4">
                      <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link"  href="#history" role="tab" aria-controls="history" aria-selected="false">Chart Harian</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#deals" role="tab" aria-controls="deals" aria-selected="false">Chart Bulanan</a>
                          </li>
                        </ul>
                      </div>
                      <div class="card-body">

                        <h4 class="card-title">Kadar {!! $deskripsi->judul !!}</h4>

                         <div class="tab-content mt-3">
                          <div class="tab-pane active" id="description" role="tabpanel">
                            <article class="justify">
                                {!! $deskripsi->deskripsi !!}
                            </article>

                          </div>

                          <div class="tab-pane" id="history" role="tabpanel" aria-labelledby="history-tab">
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

                          <div class="tab-pane " id="deals" role="tabpanel" aria-labelledby="deals-tab">
                            <div class="row">
                                <div class="col-12">
                                    <canvas  class="rounded-3 " id="linechartbulanan" ></canvas>
                                  </div>
                                <div class="card-body all-icons col-12 ">
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
                                         @foreach ( $dataco as $data )
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
                                        <a><button type="button" class="btn btn-success float-end btn-icon btn-sm">
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






@endsection

@section('js')
<script type="text/javascript">

    $('#bologna-list a').on('click', function (e) {
    e.preventDefault()
    $(this).tab('show')
    })



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
            responsive: true,
            title: {
              display: true,
              position: "top",
              text: "Last Week Registered Users -  Day Wise Count",
              fontSize: 18,
              fontColor: "#111"
            },
            legend: {
              display: true,
              position: "bottom",
              labels: {
                fontColor: "#333",
                fontSize: 16
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




    //   });
    </script>
    @endsection
