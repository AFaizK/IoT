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
  <div class="row m-3">
    <div class="col-lg-4 col-md-6 col-sm-6 mb-4" id="">
        <div class="card shadow-lg rounded-3" style="height: 200px;">
            <div class="card-body row mt-2"> 
            <p class="card-title">CH4 <span class="float-end">{{ $terbaru->created_at }}</span></p>
                <p class="card-text text-center" style="font-size: 40px">{{ $terbaru->CH4 }} ppm</p>
          </div>
          @if ($terbaru->CH4 <= '2000' )
          <div class="card-footer" style="background-color: green; font-weight: bold;">
              <span class="text-center" ><img src="Gambar/smiling.png"   height="30px" width="30px" alt="" srcset=""> Keadaan Normal !! </span>
          </div>
          @endif
          @if ($terbaru->CH4 > "2000")
          <div class="card-footer" style="background-color: red; font-weight: bold;">
              <span class="text-center" ><img src="Gambar/sad.png"   height="30px" width="30px" alt="" srcset=""> Keadaan Memburuk !! </span>
          </div>                           
          @endif 
      </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6  mb-4 ">
            <div class="card shadow-lg rounded-3" style="height: 200px;">
              <div class="card-body row">                
                <p class="card-title">NH3 <span class="float-end">{{ $terbaru2->created_at }}</span></p>
                <p class="card-text text-center" style="font-size: 40px">{{ $terbaru2->NH3 }} ppm</p>
              </div>
              @if ($terbaru2->NH3 <= "50" )
                <div class="card-footer" style="background-color: green; font-weight: bold;">
                    <span class="text-center" ><img src="Gambar/smiling.png"   height="30px" width="30px" alt="" srcset=""> Keadaan Normal !! </span>
                </div>
              @endif
              @if ($terbaru2->NH3 > "50")
                <div class="card-footer" style="background-color: red; font-weight: bold;">
                    <span class="text-center" ><img src="Gambar/sad.png"   height="30px" width="30px" alt="" srcset=""> Keadaan Memburuk !! </span>
                </div>                           
              @endif 
            </div>
          </div>
            <div class="col-lg-4 col-md-12 col-sm-12  mb-4 ">
              <div class="card shadow-lg rounded-3" style="height: 200px;">
                <div class="card-body row">                
                  <p class="card-title">CO <span class="float-end">{{ $terbaru3->created_at }}</span></p>
                  <p class="card-text text-center" style="font-size: 40px">{{ $terbaru3->CO }} ppm</p>
                </div>
                    @if ($terbaru3->CO <= "50" )
                    <div class="card-footer" style="background-color: green; font-weight: bold;">
                        <span class="text-center" ><img src="Gambar/smiling.png"   height="30px" width="30px" alt="" srcset=""> Keadaan Normal !! </span>
                    </div>
                  @endif
                  @if ($terbaru3->CO > "50")
                    <div class="card-footer" style="background-color: red; font-weight: bold;">
                        <span class="text-center" ><img src="Gambar/sad.png"   height="30px" width="30px" alt="" srcset=""> Keadaan Memburuk !! </span>
                    </div>                           
                  @endif 
                </div>
              </div>
            </div>     
 

    <div class="m-4 row">  
        <div class="card  bar col-lg-4 mb-4">
            <div class="card-header">
              <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" href="#CO-harian" role="tab" aria-controls="CO-harian" aria-selected="true">Chart Harian</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  href="#CO-bulanan" role="tab" aria-controls="CO-bulanan" aria-selected="false">Chart Bulanan</a>
                </li>
              </ul>
            </div>
            <div class="card-body">

                <div class="tab-content mt-3">
                    <div class="tab-pane active" id="CO-harian" role="tabpanel">
                        <canvas class="rounded-3" id="CO-chart"></canvas>
                    </div>
                    
                    <div class="tab-pane" id="CO-bulanan" role="tabpanel" aria-labelledby="CO-tab">  
                        <canvas class="rounded-3" id="CO-chart-bulanan"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="card  bar col-lg-4 mb-4">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#NH3-harian" role="tab" aria-controls="NH3-harian" aria-selected="true">Chart Harian</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="#NH3-bulanan" role="tab" aria-controls="NH3-bulanan" aria-selected="false">Chart Bulanan</a>
                </li>
                </ul>
            </div>
            <div class="card-body">
            
                {{-- <h4 class="card-title">Kadar</h4> --}}

                <div class="tab-content">
                    <div class="tab-pane active" id="NH3-harian" role="tabpanel">
                        <canvas class="rounded-3 " id="NH3-chart"></canvas>
                    </div>
                    
                    <div class="tab-pane" id="NH3-bulanan" role="tabpanel" aria-labelledby="NH3-tab">  
                        <canvas class="rounded-3 " id="NH3-chart-bulanan"></canvas>
                    </div>
                </div>
            </div>
        </div>
          
        <div class="card bar col-lg-4 mb-4">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#CH4-harian" role="tab" aria-controls="CH4-harian" aria-selected="true">Chart Harian</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="#CH4-bulanan" role="tab" aria-controls="CH4-bulanan" aria-selected="false">Chart Bulanan</a>
                </li>
               
                </ul>
            </div>
            <div class="card-body">
            
                {{-- <h4 class="card-title">Kadar</h4> --}}

                <div class="tab-content mt-3">
                    <div class="tab-pane active" id="CH4-harian" role="tabpanel">
                        <canvas  class="rounded-3" id="CH4-chart"></canvas>
                    </div>
                    
                    <div class="tab-pane" id="CH4-bulanan" role="tabpanel" aria-labelledby="CH4-tab">  
                        <canvas  class="rounded-3" id="CH4-chart-bulanan"></canvas>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>



    <div class="chart3 mt-2 m-4">
        <div class="card bar ">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#gabungan-harian" role="tab" aria-controls="gabungan-harian" aria-selected="true">Chart Harian</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="#gabungan-bulanan" role="tab" aria-controls="gabungan-bulanan" aria-selected="false">Chart Bulanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="#perjam" role="tab" aria-controls="perjam" aria-selected="false">Perjam</a>
                </li>
                </ul>
            </div>
            <div class="card-body">
                {{-- <h4 class="card-title">Kadar</h4> --}}
                <div class="tab-content mt-3">
                    <div class="tab-pane active" id="gabungan-harian" role="tabpanel">
                        <canvas class="rounded-3"  id="gabungan-chart"></canvas>
                    </div>
                    <div class="tab-pane" id="gabungan-bulanan" role="tabpanel" aria-labelledby="bulanan-tab">  
                        <canvas class="rounded-3"  id="gabungan-chart-bulanan"></canvas>
                    </div>
                    <div class="tab-pane" id="perjam" role="tabpanel" aria-labelledby="perjam-tab">  
                        <canvas class="rounded-3"  id="chart-perjam"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>   
  </div>
</section>
<section class="none" id="surabaya">
    <div class="row m-3">
      <div class="col-lg-4 col-md-6 col-sm-6 mb-4" id="">
          <div class="card shadow-lg rounded-3" style="height: 200px;">
              <div class="card-body row mt-2"> 
              <p class="card-title">CH4 <span class="float-end">{{ $terbarukode2->created_at }}</span></p>
                  <p class="card-text text-center" style="font-size: 40px">{{ $terbarukode2->CH4 }} ppm</p>
            </div>
            @if ($terbarukode2->CH4 <= '0.1' )
            <div class="card-footer" style="background-color: green; font-weight: bold;">
                <span class="text-center" ><img src="Gambar/smiling.png"   height="30px" width="30px" alt="" srcset=""> Keadaan Normal !! </span>
            </div>
            @endif
            @if ($terbarukode2->CH4 > "0.1")
            <div class="card-footer" style="background-color: red; font-weight: bold;">
                <span class="text-center" ><img src="Gambar/sad.png"   height="30px" width="30px" alt="" srcset=""> Keadaan Memburuk !! </span>
            </div>                           
            @endif 
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6  mb-4 ">
              <div class="card shadow-lg rounded-3" style="height: 200px;">
                <div class="card-body row">                
                  <p class="card-title">NH3 <span class="float-end">{{ $terbaru2kode2->created_at }}</span></p>
                  <p class="card-text text-center" style="font-size: 40px">{{ $terbaru2kode2->NH3 }} ppm</p>
                </div>
                @if ($terbaru2kode2->NH3 <= "50" )
                  <div class="card-footer" style="background-color: green; font-weight: bold;">
                      <span class="text-center" ><img src="Gambar/smiling.png"   height="30px" width="30px" alt="" srcset=""> Keadaan Normal !! </span>
                  </div>
                @endif
                @if ($terbaru2kode2->NH3 > "50")
                  <div class="card-footer" style="background-color: red; font-weight: bold;">
                      <span class="text-center" ><img src="Gambar/sad.png"   height="30px" width="30px" alt="" srcset=""> Keadaan Memburuk !! </span>
                  </div>                           
                @endif 
              </div>
            </div>
              <div class="col-lg-4 col-md-12 col-sm-12  mb-4 ">
                <div class="card shadow-lg rounded-3" style="height: 200px;">
                  <div class="card-body row">                
                    <p class="card-title">CO <span class="float-end">{{ $terbaru3kode2->created_at }}</span></p>
                    <p class="card-text text-center" style="font-size: 40px">{{ $terbaru3kode2->CO }} ppm</p>
                  </div>
                      @if ($terbaru3kode2->CO <= "50" )
                      <div class="card-footer" style="background-color: green; font-weight: bold;">
                          <span class="text-center" ><img src="Gambar/smiling.png"   height="30px" width="30px" alt="" srcset=""> Keadaan Normal !! </span>
                      </div>
                    @endif
                    @if ($terbaru3kode2->CO > "50")
                      <div class="card-footer" style="background-color: red; font-weight: bold;">
                          <span class="text-center" ><img src="Gambar/sad.png"   height="30px" width="30px" alt="" srcset=""> Keadaan Memburuk !! </span>
                      </div>                           
                    @endif 
                  </div>
                </div>
              </div>  
              
    
        <div class="m-4 row">  
            <div class="card  bar col-lg-4 mb-4">
                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" href="#CO-harian" role="tab" aria-controls="CO-harian" aria-selected="true">Chart Harian</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link"  href="#CO-bulanan" role="tab" aria-controls="CO-bulanan" aria-selected="false">Chart Bulanan</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
    
                    <div class="tab-content mt-3">
                        <div class="tab-pane active" id="CO-harian" role="tabpanel">
                            <canvas class="rounded-3" id="CO-chart_kode2"></canvas>
                        </div>
                        
                        <div class="tab-pane" id="CO-bulanan" role="tabpanel" aria-labelledby="CO-tab">  
                            <canvas class="rounded-3" id="CO-chart-bulanan_kode2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="card  bar col-lg-4 mb-4">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#NH3-harian" role="tab" aria-controls="NH3-harian" aria-selected="true">Chart Harian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#NH3-bulanan" role="tab" aria-controls="NH3-bulanan" aria-selected="false">Chart Bulanan</a>
                    </li>
                    </ul>
                </div>
                <div class="card-body">
                
                    {{-- <h4 class="card-title">Kadar</h4> --}}
    
                    <div class="tab-content">
                        <div class="tab-pane active" id="NH3-harian" role="tabpanel">
                            <canvas class="rounded-3 " id="NH3-chart_kode2"></canvas>
                        </div>
                        
                        <div class="tab-pane" id="NH3-bulanan" role="tabpanel" aria-labelledby="NH3-tab">  
                            <canvas class="rounded-3 " id="NH3-chart-bulanan_kode2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
              
            <div class="card bar col-lg-4 mb-4">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#CH4-harian" role="tab" aria-controls="CH4-harian" aria-selected="true">Chart Harian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#CH4-bulanan" role="tab" aria-controls="CH4-bulanan" aria-selected="false">Chart Bulanan</a>
                    </li>
                   
                    </ul>
                </div>
                <div class="card-body">
                
                    {{-- <h4 class="card-title">Kadar</h4> --}}
    
                    <div class="tab-content mt-3">
                        <div class="tab-pane active" id="CH4-harian" role="tabpanel">
                            <canvas  class="rounded-3" id="CH4-chart_kode2"></canvas>
                        </div>
                        
                        <div class="tab-pane" id="CH4-bulanan" role="tabpanel" aria-labelledby="CH4-tab">  
                            <canvas  class="rounded-3" id="CH4-chart-bulanan_kode2"></canvas>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    
    
    
        <div class="chart3 mt-2 m-4">
            <div class="card bar ">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#gabungan-harian" role="tab" aria-controls="gabungan-harian" aria-selected="true">Chart Harian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#gabungan-bulanan" role="tab" aria-controls="gabungan-bulanan" aria-selected="false">Chart Bulanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#perjam" role="tab" aria-controls="perjam" aria-selected="false">Perjam</a>
                    </li>
                    </ul>
                </div>
                <div class="card-body">
                    {{-- <h4 class="card-title">Kadar</h4> --}}
                    <div class="tab-content mt-3">
                        <div class="tab-pane active" id="gabungan-harian" role="tabpanel">
                            <canvas class="rounded-3"  id="gabungan-chart_kode2"></canvas>
                        </div>
                        <div class="tab-pane" id="gabungan-bulanan" role="tabpanel" aria-labelledby="bulanan-tab">  
                            <canvas class="rounded-3"  id="gabungan-chart-bulanan_kode2"></canvas>
                        </div>
                        <div class="tab-pane" id="perjam" role="tabpanel" aria-labelledby="perjam-tab">  
                            <canvas class="rounded-3"  id="chart-perjam"></canvas>
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
            
            document.getElementById('malang').classList.remove('none');
            
            function enableBrand(answer){
            if(answer.value == 'malang'){
                // document.getElementById('surabaya').style.display = "none";
                // document.getElementById('malang').classList.remove = "none";
                document.getElementById('malang').classList.remove('none');
                document.getElementById('surabaya').classList.add('none');
                // document.getElementById('malang').style.display = "on";
            }else if(answer.value == 'surabaya'){
                document.getElementById('surabaya').classList.remove('none');
                document.getElementById('malang').classList.add('none');
            }else{
                document.getElementById('surabaya').classList.add('none');
                document.getElementById('malang').classList.add('none');
            }
            console.log(answer.value);
        }


          var cData_kode2 = JSON.parse(`<?php echo $data_kode2; ?>`);
          var cData1_kode2 = JSON.parse(`<?php echo $data1_kode2; ?>`);
          var cData2_kode2 = JSON.parse(`<?php echo $data2_kode2; ?>`);
          var cData22_kode2 = JSON.parse(`<?php echo $data22_kode2; ?>`);
          var cData3_kode2 = JSON.parse(`<?php echo $data3_kode2; ?>`);
          var cData33_kode2 = JSON.parse(`<?php echo $data33_kode2; ?>`);


          var ctx_kode2 = $("#CO-chart_kode2");
          var ctx2_kode2 = $("#NH3-chart_kode2");
          var ctx3_kode2 = $("#CH4-chart_kode2");
          var ctx1_kode2 = $("#CO-chart-bulanan_kode2");
          var ctx22_kode2 = $("#NH3-chart-bulanan_kode2");
          var ctx33_kode2 = $("#CH4-chart-bulanan_kode2");
          var ctx4_kode2 = $("#gabungan-chart_kode2");
          var ctx44_kode2 = $("#gabungan-chart-bulanan_kode2");
     
          //pie chart data

          var data_kode2 = {
            labels: cData_kode2.label,
            datasets: [
              {
                label: "Kadar CO" ,
                data: cData_kode2.data,
                backgroundColor:"rgba(158, 118, 80, 0.288)",
                borderColor:"rgba(158, 118, 80, 1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(158, 118, 80, 0.58)",
                hoverBorderColor: "rgba(158, 118, 80, 1)",
              }
            ]
          };
          var data1_kode2 = {
            labels: cData1_kode2.label,
            datasets: [
              {
                label: "Kadar CO" ,
                data: cData1_kode2.data,
                backgroundColor:"rgba(158, 118, 80, 0.288)",
                borderColor:"rgba(158, 118, 80, 1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(158, 118, 80, 0.58)",
                hoverBorderColor: "rgba(158, 118, 80, 1)",
              }
            ]
          };
          var data2_kode2 = {
            labels: cData2_kode2.label,
            datasets: [
              {
                label: "Kadar NH3" ,
                data: cData2_kode2.data,
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(255,99,132,0.4)",
                hoverBorderColor: "rgba(255,99,132,1)",
              }
            ]
          };
          var data22_kode2 = {
            labels: cData22_kode2.label,
            datasets: [
              {
                label: "Kadar NH3" ,
                data: cData22_kode2.data,
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(255,99,132,0.4)",
                hoverBorderColor: "rgba(255,99,132,1)",
              }
            ]
          };
          var data3_kode2 = {
            labels: cData3_kode2.label,
            datasets: [
              {
                label: "Kadar CH4" ,
                data: cData3_kode2.data,
                backgroundColor:"rgba(158, 118, 80, 0.288)",
                backgroundColor:"rgba(127, 155, 233, 0.1)",
                borderColor: "rgba(127, 155, 233, 0.726)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(127, 155, 233, 0.3)",
                hoverBorderColor: "rgba(127, 155, 233, 0.726)",
              }
            ]
          };
           var data33_kode2 = {
            labels: cData33_kode2.label,
            datasets: [
              {
                label: "Kadar CH4" ,
                data: cData33_kode2.data,
                backgroundColor:"rgba(158, 118, 80, 0.288)",
                backgroundColor:"rgba(127, 155, 233, 0.1)",
                borderColor: "rgba(127, 155, 233, 0.726)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(127, 155, 233, 0.3)",
                hoverBorderColor: "rgba(127, 155, 233, 0.726)",
              }
            ]
          };
          var data4_kode2 = {
            labels: cData_kode2.label,
            datasets: [
              {
                label: "Kadar CO" ,
                data: cData_kode2.data,
                backgroundColor:"rgba(158, 118, 80, 0.288)",
                borderColor:"rgba(158, 118, 80, 1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(158, 118, 80, 0.58)",
                hoverBorderColor: "rgba(158, 118, 80, 1)",
              }, {
                label: "Kadar NH3" ,
                data: cData2_kode2.data,
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(255,99,132,0.4)",
                hoverBorderColor: "rgba(255,99,132,1)",
              }, {
                label: "Kadar CH4" ,
                data: cData3_kode2.data,
                backgroundColor:"rgba(158, 118, 80, 0.288)",
                backgroundColor:"rgba(127, 155, 233, 0.1)",
                borderColor: "rgba(127, 155, 233, 0.726)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(127, 155, 233, 0.3)",
                hoverBorderColor: "rgba(127, 155, 233, 0.726)",
              },
            ]
          };
          var data44_kode2 = {
            labels: cData22_kode2.label,
            datasets: [
              {
                label: "Kadar CO" ,
                data: cData1_kode2.data,
                backgroundColor:"rgba(158, 118, 80, 0.288)",
                borderColor:"rgba(158, 118, 80, 1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(158, 118, 80, 0.58)",
                hoverBorderColor: "rgba(158, 118, 80, 1)",
              }, {
                label: "Kadar NH3" ,
                data: cData22_kode2.data,
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(255,99,132,0.4)",
                hoverBorderColor: "rgba(255,99,132,1)",
              }, {
                label: "Kadar CH4" ,
                data: cData33_kode2.data,
                backgroundColor:"rgba(158, 118, 80, 0.288)",
                backgroundColor:"rgba(127, 155, 233, 0.1)",
                borderColor: "rgba(127, 155, 233, 0.726)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(127, 155, 233, 0.3)",
                hoverBorderColor: "rgba(127, 155, 233, 0.726)",
              },
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
            size: 12,
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
            size: 12,
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
            // text: 'Kadar NH3',
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
     
          var chart = new Chart(ctx_kode2, {
            type: "bar",
            data: data_kode2,
            options: options
          });
          var chart = new Chart(ctx1_kode2, {
            type: "bar",
            data: data1_kode2,
            options: options
          });
          var chart = new Chart(ctx2_kode2, {
            type: "bar",
            data: data2_kode2,
            options: options
          });  
          var chart = new Chart(ctx22_kode2, {
            type: "bar",
            data: data22_kode2,
            options: options
          });
           var chart = new Chart(ctx3_kode2, {
            type: "bar",
            data: data3_kode2,
            options: options
          });  
           var chart = new Chart(ctx33_kode2, {
            type: "bar",
            data: data33_kode2,
            options: options
          });
          var chart = new Chart(ctx4_kode2, {
            type: "line",
            data: data4_kode2,
            options: options
          });
          var chart = new Chart(ctx44_kode2, {
            type: "line",
            data: data44_kode2,
            options: options
          });
     


    //   $(function(){
          //Kode 1

          var cData = JSON.parse(`<?php echo $chart_data; ?>`);
          var cData1 = JSON.parse(`<?php echo $chart_data1; ?>`);
          var cData2 = JSON.parse(`<?php echo $chart_data2; ?>`);
          var cData22 = JSON.parse(`<?php echo $chart_data22; ?>`);
          var cData3 = JSON.parse(`<?php echo $chart_data3; ?>`);
          var cData33 = JSON.parse(`<?php echo $chart_data33; ?>`);


          var ctx = $("#CO-chart");
          var ctx2 = $("#NH3-chart");
          var ctx3 = $("#CH4-chart");
          var ctx1 = $("#CO-chart-bulanan");
          var ctx22 = $("#NH3-chart-bulanan");
          var ctx33 = $("#CH4-chart-bulanan");
          var ctx4 = $("#gabungan-chart");
          var ctx44 = $("#gabungan-chart-bulanan");
     
          //pie chart data

          var data = {
            labels: cData.label,
            datasets: [
              {
                label: "Kadar CO" ,
                data: cData.data,
                backgroundColor:"rgba(158, 118, 80, 0.288)",
                borderColor:"rgba(158, 118, 80, 1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(158, 118, 80, 0.58)",
                hoverBorderColor: "rgba(158, 118, 80, 1)",
              }
            ]
          };
          var data1 = {
            labels: cData1.label,
            datasets: [
              {
                label: "Kadar CO" ,
                data: cData1.data,
                backgroundColor:"rgba(158, 118, 80, 0.288)",
                borderColor:"rgba(158, 118, 80, 1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(158, 118, 80, 0.58)",
                hoverBorderColor: "rgba(158, 118, 80, 1)",
              }
            ]
          };
          var data2 = {
            labels: cData2.label,
            datasets: [
              {
                label: "Kadar NH3" ,
                data: cData2.data,
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(255,99,132,0.4)",
                hoverBorderColor: "rgba(255,99,132,1)",
              }
            ]
          };
          var data22 = {
            labels: cData22.label,
            datasets: [
              {
                label: "Kadar NH3" ,
                data: cData22.data,
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(255,99,132,0.4)",
                hoverBorderColor: "rgba(255,99,132,1)",
              }
            ]
          };
          var data3 = {
            labels: cData3.label,
            datasets: [
              {
                label: "Kadar CH4" ,
                data: cData3.data,
                backgroundColor:"rgba(158, 118, 80, 0.288)",
                backgroundColor:"rgba(127, 155, 233, 0.1)",
                borderColor: "rgba(127, 155, 233, 0.726)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(127, 155, 233, 0.3)",
                hoverBorderColor: "rgba(127, 155, 233, 0.726)",
              }
            ]
          };
           var data33 = {
            labels: cData33.label,
            datasets: [
              {
                label: "Kadar CH4" ,
                data: cData33.data,
                backgroundColor:"rgba(158, 118, 80, 0.288)",
                backgroundColor:"rgba(127, 155, 233, 0.1)",
                borderColor: "rgba(127, 155, 233, 0.726)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(127, 155, 233, 0.3)",
                hoverBorderColor: "rgba(127, 155, 233, 0.726)",
              }
            ]
          };
          var data4 = {
            labels: cData.label,
            datasets: [
              {
                label: "Kadar CO" ,
                data: cData.data,
                backgroundColor:"rgba(158, 118, 80, 0.288)",
                borderColor:"rgba(158, 118, 80, 1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(158, 118, 80, 0.58)",
                hoverBorderColor: "rgba(158, 118, 80, 1)",
              }, {
                label: "Kadar NH3" ,
                data: cData2.data,
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(255,99,132,0.4)",
                hoverBorderColor: "rgba(255,99,132,1)",
              }, {
                label: "Kadar CH4" ,
                data: cData3.data,
                backgroundColor:"rgba(158, 118, 80, 0.288)",
                backgroundColor:"rgba(127, 155, 233, 0.1)",
                borderColor: "rgba(127, 155, 233, 0.726)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(127, 155, 233, 0.3)",
                hoverBorderColor: "rgba(127, 155, 233, 0.726)",
              },
            ]
          };
          var data44 = {
            labels: cData22.label,
            datasets: [
              {
                label: "Kadar CO" ,
                data: cData1.data,
                backgroundColor:"rgba(158, 118, 80, 0.288)",
                borderColor:"rgba(158, 118, 80, 1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(158, 118, 80, 0.58)",
                hoverBorderColor: "rgba(158, 118, 80, 1)",
              }, {
                label: "Kadar NH3" ,
                data: cData22.data,
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(255,99,132,0.4)",
                hoverBorderColor: "rgba(255,99,132,1)",
              }, {
                label: "Kadar CH4" ,
                data: cData33.data,
                backgroundColor:"rgba(158, 118, 80, 0.288)",
                backgroundColor:"rgba(127, 155, 233, 0.1)",
                borderColor: "rgba(127, 155, 233, 0.726)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(127, 155, 233, 0.3)",
                hoverBorderColor: "rgba(127, 155, 233, 0.726)",
              },
            ]
          };
 
 
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
            size: 12,
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
            size: 12,
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
            // text: 'Kadar NH3',
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
     
          var chart = new Chart(ctx, {
            type: "bar",
            data: data,
            options: options
          });
          var chart = new Chart(ctx1, {
            type: "bar",
            data: data1,
            options: options
          });
          var chart = new Chart(ctx2, {
            type: "bar",
            data: data2,
            options: options
          });  
          var chart = new Chart(ctx22, {
            type: "bar",
            data: data22,
            options: options
          });
           var chart = new Chart(ctx3, {
            type: "bar",
            data: data3,
            options: options
          });  
           var chart = new Chart(ctx33, {
            type: "bar",
            data: data33,
            options: options
          });
          var chart = new Chart(ctx4, {
            type: "line",
            data: data4,
            options: options
          });
          var chart = new Chart(ctx44, {
            type: "line",
            data: data44,
            options: options
          });
     


    //   });
    </script>
    @endsection