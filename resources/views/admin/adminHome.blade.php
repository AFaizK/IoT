@extends('layouts.adminMain')

@section('container')
      <div class="row m-2">
        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
      <div class="card ">
        <div class="card-body">
          <img src="Gambar/high-temperature.png" class="float-start position-absolute" style="margin-top: -10px;" height="50px" width="50px" alt="" srcset="">
          <p class="card-title text-end">34 C</p>
        </div>
        <div class="card-footer text-muted">
         Ini Adin ygy
        </div>
      </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6 mb-4">
          <div class="card ">
            <div class="card-body">
              <img src="Gambar/high-temperature.png" class="float-start position-absolute" style="margin-top: -10px;" height="50px" width="50px" alt="" srcset="">
              <p class="card-title text-end">34 C</p>
            </div>
            <div class="card-footer text-muted">
              2 days ago
            </div>
          </div>
            </div>
            <div class="col-lg-2 col-md-4  col-sm-4 mb-4">
              <div class="card ">
                <div class="card-body">
                  <img src="Gambar/carbon-dioxide.png" class="float-start position-absolute" style="margin-top: -10px;" height="55px" width="55px" alt="" srcset="">
                  <p class="card-title text-end">34 C</p>
                </div>
                <div class="card-footer text-muted">
                  2 days ago
                </div>
              </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4  mb-4">
                  <div class="card ">
                    <div class="card-body">
                      <img src="Gambar/carbon-monoxide.png" class="float-start position-absolute" style="margin-top: -10px;" height="50px" width="50px" alt="" srcset="">
                      <p class="card-title text-end">34 C</p>
                    </div>
                    <div class="card-footer text-muted">
                      2 days ago
                    </div>
                  </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-4 mb-4">
                      <div class="card ">
                        <div class="card-body">
                          <img src="Gambar/ch4.png" class="float-start position-absolute" style="margin-top: -10px;" height="50px" width="50px" alt="" srcset="">
                          <p class="card-title text-end">34 C</p>
                        </div>
                        <div class="card-footer text-muted">
                          2 days ago
                        </div>
                      </div>
                       </div>         
      </div>   

        <div class="row m-2">   
            <div class="bar col-md-4  mt-4">
                <canvas class="rounded-3" id="barChart"></canvas>
            </div>
            <div class="col-md-4 mt-4">
                <canvas class="rounded-3 " id="barChart2"></canvas>
            </div>
            <div class="col-md-4  mt-4">
                <canvas  class="rounded-3" id="barChart3"></canvas>
            </div>
        </div>
        <div class="chart3 mt-2">
            <canvas class="rounded-3"  id="lineChart3"></canvas>
        </div>   


@endsection

 