$form = $('#visualiser-form');

$form.on('submit', function(e) {
  e.preventDefault();
  timePeriod = $form.find('#time-period').val();
  regionSlug = $form.find('#region').val();

  url = "../crimes/" + timePeriod + "/" + regionSlug + "/json";

  $.get(url, function(data) { console.log(data); });
});
