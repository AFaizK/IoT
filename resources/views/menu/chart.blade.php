<!DOCTYPE html>
<html>
<head>
    <title>Laravel ChartJS Chart Example - ItSolutionStuff.com</title>
</head>
    
<body>
    <canvas id="pie-chart" height="100px"></canvas>
    <canvas id="NH3-chart" height="100px"></canvas>
    <canvas id="CH4-chart" height="100px"></canvas>
</body>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
<script type="text/javascript">
  
//   $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var cData2 = JSON.parse(`<?php echo $chart_data2; ?>`);
    //   var cData3 = JSON.parse(`<?php echo $chart_data3; ?>`);
      var ctx = $("#pie-chart");
      var ctx2 = $("#NH3-chart");
    //   var ctx3 = $("#CH4-chart");
 
      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Kadar CO2" ,
            data: cData.data,
            backgroundColor: [
              "#DEB887"
        
            ],
            borderColor: [
              "#CDA776"
 
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
      var data2 = {
        labels: cData2.label,
        datasets: [
          {
            label: "Kadar CO2" ,
            data: cData2.data,
            backgroundColor: [
              "#DEB887"
        
            ],
            borderColor: [
              "#CDA776"
 
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };
    //   var data3 = {
    //     labels: cData3.label,
    //     datasets: [
    //       {
    //         label: "Kadar CO2" ,
    //         data: cData3.data,
    //         backgroundColor: [
    //           "#DEB887"
        
    //         ],
    //         borderColor: [
    //           "#CDA776"
 
    //         ],
    //         borderWidth: [1, 1, 1, 1, 1,1,1]
    //       }
    //     ]
    //   };
 
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
    //   var chart3 = new Chart(ctx3, {
    //     type: "bar",
    //     data: data3,
    //     options: options
    //   });
 
//   });


  
</script>
</html>