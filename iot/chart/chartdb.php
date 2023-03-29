<?php

if (isset($_GET['tkn']) && !empty($_GET['tkn']) &&
    isset($_GET['id']) && !empty($_GET['id']) &&
    isset($_GET['in']) && !empty($_GET['in']) &&
    isset($_GET['row']) && !empty($_GET['row'])) {

    include_once '../classes/autoload.php';
    $db = new Database;
    $clientID = $_GET['id'];
    $token = $_GET['tkn'];
    $rowCount=abs($_GET['row']);
    $prm=$_GET['in'];
    $tableName = "id_" . $clientID;
    $datasReverse=array();
    $datas=array();


    $query_SearchToken = "SELECT * FROM `user` u WHERE u.`clientID`='$clientID' AND u.`token`='$token'";
    if (mysqli_num_rows($result_SearchToken = $db->conn->query($query_SearchToken))) {

        $query = "SELECT ".$prm.",`time_date` FROM " . $tableName . " ORDER by `time_date` desc LIMIT ".$rowCount;
        $result = mysqli_query($db->conn, $query);
        if (mysqli_num_rows($result)) {
            while($row=mysqli_fetch_assoc($result)){
                $timedate=$row['time_date'];
                $value=round(abs($row[$prm]),2);

                $arr=array(
                        "timedate"=>$timedate,
                        "value"=>$value
                );

                array_push($datasReverse,$arr);
            }
            $datas=array_reverse($datasReverse);

        }else{
            exit('Not Found Data');
        }



    }else{
        exit('Invalid information entered');
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart With Api</title>
    <link rel="stylesheet" href="asset/css/bootstrap.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/led.css">

</head>


<body onload="LoadChart();">

<div class="container">

    <div id="chartdiv" class="mt-2"></div>
</div>


<script src="asset/amcharts4/core.js"></script>
<script src="asset/amcharts4/charts.js"></script>
<script src="asset/amcharts4/themes/dark.js"></script>
<script src="asset/amcharts4/themes/animated.js"></script>
<script src="asset/amcharts4/plugins/bullets.js"></script>


<script type='text/javascript'>
    var datas;
    var dateAxis;
    var valueAxis;
    var series;
    var bullet;
    var labelTooltip="value";
    var status;
    var clientID='<?=$clientID?>';
    var param='<?=$prm?>';

    var js_array_datas = <?php echo json_encode($datas); ?>;
    console.log(js_array_datas);


    // Themes begin
    am4core.useTheme(am4themes_dark);
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartdiv", am4charts.XYChart);
    chart.paddingRight = 20;



    function LoadChart() {
        datas = GetData();
        chart.data = datas;

        dateAxis = chart.xAxes.push(new am4charts.DateAxis());

        //dateAxis.tooltipDateFormat = "HH:mm:ss, d MMMM";
        dateAxis.tooltip.disabled = true;
        dateAxis.renderer.grid.template.location = 0;
        dateAxis.renderer.axisFills.template.disabled = true;
        dateAxis.renderer.ticks.template.disabled = true;


        valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.tooltip.disabled = true;
        valueAxis.renderer.minWidth = 35;
        valueAxis.renderer.axisFills.template.disabled = true;
        valueAxis.renderer.ticks.template.disabled = true;


        series = chart.series.push(new am4charts.LineSeries());
        series.dataFields.dateX = "date";
        series.dataFields.valueY = "value";
        series.strokeWidth = 2;
        series.tooltipText =  "({value}) \n {DateTime}";
        chart.dateFormatter.dateFormat = "yyyy-MM-dd HH:mm:ss";

        // set stroke property field
        series.propertyFields.stroke = "color";
        series.propertyFields.strokeDasharray = "dash";


        bullet = series.bullets.push(new am4plugins_bullets.ShapeBullet());
        bullet.propertyFields.shape = "bullet";
        bullet.strokeWidth = 1;
        bullet.stroke = am4core.color("#fff");
        bullet.propertyFields.fill = "bulletColor";
        bullet.size = 10;
        bullet.visible = true;
        bullet.propertyFields.visible = true;

        chart.cursor = new am4charts.XYCursor();

        var scrollbarX = new am4core.Scrollbar();
        chart.scrollbarX = scrollbarX;

        /**
         dateAxis.start = 0.7;
         dateAxis.keepSelection = true;
         */
        document.getElementById("wait").style.visibility ="hidden";
    }




    function GetData() {
        if (js_array_datas.length == 0) {
            alert("There is no data ");
            document.getElementById("chartdiv").innerHTML = "There is no data";
        }
        var datas = [];

        var i = 0;

        var dayNightColor = "#dc8c67";

        var bulletType = "circle";
        var bulletColor = "#264d73";

        for (var obj in js_array_datas) {
            var dateTime = new Date(js_array_datas[obj].timedate);
            var datePersian = new Date(js_array_datas[obj].timedate).toLocaleDateString('fa-IR');
            var TimePersian = new Date(js_array_datas[obj].timedate).toLocaleTimeString('fa-IR');
            var dateTimePersian = "   " + datePersian.substr(5,5) + "   " + TimePersian;

                var a = {
                    "index": i,
                    "date": dateTime,
                    "DateTime": dateTimePersian,
                    "value": js_array_datas[obj].value,
                    "color": am4core.color(dayNightColor),
                    "dash": "0",
                    "bullet": bulletType,
                    "bulletColor": am4core.color(bulletColor)
                };
                datas.push(a);

                console.log("obj:"+obj+";     value: "+js_array_datas[obj].value+";   date: "+dateTime);

            i++;
        }

        var indexNextPoint
        for (var b = 0; b < datas.length; b++) {

            indexNextPoint = b + 1;
            if (indexNextPoint < datas.length) {
                pointNow = datas[b].date;
                pointNext = datas[indexNextPoint].date;
                var difpoints = parseInt((pointNext - pointNow) / 1000);

                if (difpoints > 3600) {
                    datas[b].dash = "8,4,2,4";
                    datas[b].color = am4core.color("#fff");
                    //console.log("difpoints: " + difpoints + ";   pointNext: " + pointNext + ";    pointNow:" + pointNow + ";     value:" + datas[b].value + ";     dateTime:" + datas[b].date);
                }
            }
        }


        console.log("datas.length: " + datas.length);
        console.log(datas);

        return datas;

    }






</script>


</body>

</html>
<?php
    $db->conn->close();

}
else{
    echo "<script>alert('Invalid information entered');</script>";
}

?>