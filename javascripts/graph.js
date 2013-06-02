$(function() {
  if($('#crime-chart').length) {
    var id = String(location.pathname).split('/').pop();

    $.ajax({
      url: '/suburbs/crimejson/' + id,
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        var values = $.each(data, function(index, element) {
          element['x'] = parseInt(element['year']);
          element['y'] = parseInt(element['total_count']);
          return element;
        })

        var crimeData = [
          {
            values: values,
            key: 'Crime',
            color: '#ca345e'
          }
        ];


        // Population Chart
        nv.addGraph(function() {
          var chart1 = nv.models.lineChart();

          chart1.xAxis
              .axisLabel('Year');
              //.tickFormat(d3.format(',r'));

          chart1.yAxis
              .axisLabel('Total Crime');
              //.tickFormat(d3.format('.02f'));

          d3.select('#crime-chart svg')
              .datum(crimeData)
              .transition().duration(500)
              .call(chart1);

          nv.utils.windowResize(function() { d3.select('#crime-chart svg').call(chart1) });

          return chart1;
        });


      }
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