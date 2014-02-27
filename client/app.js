var $form = $('#visualiser-form');

$form.on('submit', function(e) {
  e.preventDefault();
  var timePeriod = $form.find('#time-period').val();
  var regionSlug = $form.find('#region').val();

  var url = "../crimes/" + timePeriod + "/" + regionSlug + "/json";

  var context = document.getElementById('chart').getContext("2d");

  $.get(url, function(data) {
    var areas = data.response.crimes.region.areas;
    window.areas = areas;

    var labels = [];
    var values = [];

    $.each(areas, function(){
      labels.push(this.id);
      values.push(this.total);
    });

    console.log(labels);
    console.log(values);

    var chartValues = {
      labels: labels,
      datasets: [{ data: values }]
    }

    var chart = new Chart(context).Bar(chartValues);
  });

});
