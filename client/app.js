var $form = $('#visualiser-form');

$form.on('submit', function(e) {
  e.preventDefault();
  var timePeriod = $form.find('#time-period').val();
  var regionSlug = $form.find('#region').val();

  var url = "../crimes/" + timePeriod + "/" + regionSlug + "/json";

  var barChartContext = document.getElementById('barChart').getContext("2d");
  var pieChartContext = document.getElementById('pieChart').getContext("2d");

  $.get(url, function(data) {
    var areas = data.response.crimes.region.areas;
    window.areas = areas;

    var labels = [];
    var values = [];

    $.each(areas, function(){
      labels.push(this.id);
      values.push(parseInt(this.total));
    });

    window.labels = labels;
    window.values = values;

    var barChartValues = {
      labels: labels,
      datasets: [{ data: values }]
    }

    var pieChartValues = $.map(values, function(val){ return {color:'#000000',value: val}; });

    var barChart = new Chart(barChartContext).Bar(barChartValues);
    var pieChart = new Chart(pieChartContext).Pie(pieChartValues);
  });

});
