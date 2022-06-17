@extends('layouts.main')

@section('home')

      <div class="row m-2">
        <div class="bar col-md-4  mt-4">
            <h3 class="text-center">{!! $deskripsi->judul !!}</h3>
                <article class="justify">
                    {!! $deskripsi->deskripsi !!}
                </article>
            
          </div>
          <div class="col-md-8  mt-4" >
            <canvas  class="rounded-3" id="linechart"></canvas>
          </div>
      </div>

@endsection

@section('js')
<script type="text/javascript">
  
    //   $(function(){
          //get the pie chart canvas
          var cData = JSON.parse(`<?php echo $chart_data; ?>`);


          var ctx = $("#linechart");

     
          //pie chart data
          var data = {
            labels: cData.label,
            datasets: [
              {
                label: "Kadar NH3" ,
                data: cData.data,
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                borderWidth: 2,
                hoverBackgroundColor: "rgba(255,99,132,0.4)",
                hoverBorderColor: "rgba(255,99,132,1)",
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
     
    //   });
    </script>
    @endsection