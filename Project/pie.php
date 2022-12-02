<!DOCTYPE html>
<html>
    <head>
        <link href = "style.css" type = "text/css" rel = "stylesheet" />
        <h1> Pie chart to get count of customers under each agent</h1>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
            function drawChart() {

                var jsonData = $.ajax({
                    url: "getData.php",
                    dataType: "json",
                    async: false
                }).responseText;

                var data = new google.visualization.DataTable(jsonData);


                var chart = new google.visualization.PieChart(document.getElementById('player_info'));
                chart.draw(data, {width: 400, height: 240});
            }

            google.charts.load('current', {'packages':['corechart']});


            google.charts.setOnLoadCallback(drawChart);
        </script>
    </head>
    <body>
        <div id="player_info"></div>
    </body>
</html>
