<!DOCTYPE html>
<html>
<head>
  <title>Police Recorded Crime Data Visualiser</title>
</head>
<body>
  <h1>Police Recorded Crime Data Visualiser</h1>

  <form id="visualiser-form">
    <label for="time-period">Select Time Period</label>
    <select name="time-period" id="time-period">
      <option value="6-2013">6-2013</option>
    </select>

    <label for="region">Select Region</label>
    <select name="region" id="region">
      <option value="north_east">6-2013</option>
    </select>

    <input type="submit" />
  </form>

  <canvas id="chart" width="600", height="400">You must have a modern browser that supports HTMTL5 canvas to view the chart.</canvas>

  <script src="jquery.min.js"></script>
  <script src="chart.min.js"></script>
  <script src="app.js"></script>
</body>
</html>