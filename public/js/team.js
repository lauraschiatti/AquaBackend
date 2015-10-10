$(function () {
// Create theme
Highcharts.theme = {
   colors: ["#FFFFFF"],
   chart: {
      backgroundColor: null,
   },
   xAxis: {
      gridLineWidth: 1,
      labels: {
         style: {
            fontSize: '10px',
            color: '#FFFFFF',
            fontWeight: 'bold',
            textTransform: 'uppercase'
         }
      }
   },
   yAxis: {
      labels: {
         style: {
            fontSize: '14px',
            color: '#FFFFFF',
            fontWeight: 'bold'
         }
      }
   },
   tooltip: {
      borderWidth: 0,
      backgroundColor: '#FFFFFF',
      shadow: false
    },
  legend: null
};

// Apply the theme
Highcharts.setOptions(Highcharts.theme);

   //Create Graph
   $('#team-graph').highcharts({

       chart: {
           polar: true,
           type: 'line'
       },

       title: null,
       pane: {
           size: '80%'
       },

       xAxis: {
           categories: ['Lines of Code: 2.8K ', 'Hours worked: 1.5K', 'Coffees drunk: 2.6K', 'Conversations: 0.6K',
                   'Mails Opened: 1.5K', 'Kb Sent: 1.8K'],
           tickmarkPlacement: 'on',
           lineWidth: 0
       },

       yAxis: {
           gridLineInterpolation: 'polygon',
           lineWidth: 0,
           min: 0
       },

       tooltip: {
           shared: true,
           pointFormat: '<b>{}</b><br/>'
       },

       legend: {
           align: 'right',
           verticalAlign: 'top',
           y: 70,
           layout: 'vertical'
       },

       series: [{
           name: '',
           data: [2800, 1500, 2600, 600, 1500, 1800],
           pointPlacement: 'on'
       }]

   });
});
