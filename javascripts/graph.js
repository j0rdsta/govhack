$(function() {
  if($('#crime-chart').length) {
    // Crime Chart
    nv.addGraph(function() {
      var chart = nv.models.lineChart();

      chart.xAxis
          .axisLabel('Time (ms)')
          .tickFormat(d3.format(',r'));

      chart.yAxis
          .axisLabel('Voltage (v)')
          .tickFormat(d3.format('.02f'));

      d3.select('#crime-chart svg')
          .datum(sinAndCos())
          .transition().duration(500)
          .call(chart);

      nv.utils.windowResize(function() { d3.select('#crime-chart svg').call(chart) });

      return chart;
    });
  }
  
  if($('#population-chart').length) {
    var id = String(location.pathname).split('/').pop();

    $.ajax({
      url: '/suburbs/populationjson/' + id,
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        var values = $.each(data, function(index, element) {
          element['x'] = parseInt(element['year']);
          element['y'] = parseInt(element['population']);
          return element;
        })

        var populationData = [
          {
            values: values,
            key: 'Population',
            color: '#ca345e'
          }
        ];


        // Population Chart
        nv.addGraph(function() {
          var chart2 = nv.models.lineChart();

          chart2.xAxis
              .axisLabel('Year');
              //.tickFormat(d3.format(',r'));

          chart2.yAxis
              .axisLabel('Population');
              //.tickFormat(d3.format('.02f'));

          d3.select('#population-chart svg')
              .datum(populationData)
              .transition().duration(500)
              .call(chart2);

          nv.utils.windowResize(function() { d3.select('#population-chart svg').call(chart2) });

          return chart2;
        });


      }
    });




  }

  /**************************************
   * Simple test data generator
   */

  function sinAndCos() {
    var sin = [],
        cos = [];

    for (var i = 0; i < 100; i++) {
      sin.push({x: i, y: Math.sin(i/10)});
      cos.push({x: i, y: .5 * Math.cos(i/10)});
    }

    return [
      {
        values: sin,
        key: 'Sine Wave',
        color: '#ff7f0e'
      },
      {
        values: cos,
        key: 'Cosine Wave',
        color: '#2ca02c'
      }
    ];
  }
});