<?php

if (isset($_GET['tkn']) && !empty($_GET['tkn']) &&
    isset($_GET['id']) && !empty($_GET['id']) &&
    isset($_GET['row']) && !empty($_GET['row']) &&
    isset($_GET['in1']) && !empty($_GET['id']) &&
    isset($_GET['in2']) && !empty($_GET['id']) &&
    isset($_GET['in3']) && !empty($_GET['id']) &&
    isset($_GET['in4']) && !empty($_GET['id'])) {

    include_once '../classes/autoload.php';
    $db = new Database;
    $clientID = $_GET['id'];
    $token = $_GET['tkn'];
    $rowCount=abs($_GET['row']);
    $in1=$_GET['in1'];
    $in2=$_GET['in2'];
    $in3=$_GET['in3'];
    $in4=$_GET['in4'];
    $tableName = "id_" . $clientID;


    $data1 = [];
    $data2 = [];
    $data3 = [];
    $data4 = [];
    $data5 = '';


    $query_SearchToken = "SELECT * FROM `user` u WHERE u.`clientID`='$clientID' AND u.`token`='$token'";
    if (mysqli_num_rows($result_SearchToken = $db->conn->query($query_SearchToken))) {

        $query = "SELECT * FROM " . $tableName . " ORDER by `time_date` desc LIMIT ".$rowCount;
        $result = mysqli_query($db->conn, $query);
        if (mysqli_num_rows($result)) {
            while($row=mysqli_fetch_assoc($result)){
                $data1[] = round($row[$in1] , 1);
                $data2[] = round($row[$in2] , 1);
                $data3[] = round($row[$in3] , 1);
                $data4[] = round($row[$in4] , 1);
                $data5 = $data5 . '"' . date("M / d   H : i", strtotime($row['time_date'])) . '",';
            }

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


    <body>

    <div class="container-fluid">
        <div class="row mb-3  justify-content-center">
            <div class="col" id="lineB"></div>
            <div class="col" id="lineC"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col" id="lineD"></div>
            <div class="col" id="lineE"></div>
        </div>

    </div>


    <!--js-highchart-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/9.3.3/highcharts.js" integrity="sha512-noXK66BSiB7VkjM8nmuM6q6TxiUnXnbC+IU1A7/KeNdp0wdOuKSB4vOAKKKi8h2AWjK9faRnEVckf9ajcTS82A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/9.3.3/modules/exporting.js" integrity="sha512-BvqnEWt9Aa61ef39Cc3XkdAqZ/8+tnKnqy9V4nqN1uHTqcp1d9q79ZWrIpVqNyaW0AkEljwsLqGowVryhSMWxA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/9.3.3/modules/export-data.js" integrity="sha512-6NB3dZunAqHwxaUozEVEdX+x8FJWIXjtLk8BhqsICozfKaaAqi3OGGBGveRSr5Tqmr+pdNZq2WOWUuBf5RD2lw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/9.3.3/es-modules/Accessibility/Accessibility.js" integrity="sha512-8khtBL6LUBpCIUhZivNOTy3nzi0WkXC04D1txx58cmCDNQU4B2a6+2/aZ346AmVA6wE8ocTZ6SGib9uWZ+b+Xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/9.3.3/highcharts-more.js" integrity="sha512-CbobtjhkRdQdv5wn1p+0TXSsjIQPpZV0b5BdQJdCJufyrLmO3EVZ1dUjcKjKaGno75BNwMK6m2NCwtXpgcPRBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/9.3.3/themes/dark-unica.src.js" integrity="sha512-439n8dpXA9UWXYZsyiD7msib6ILHzB5qVP3qdBTQ6sPLC32T+DKuWyBgIIAze2wqCNCqgwRj6cBPJFMEK1V7+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        Highcharts.chart('lineB', {
            colors: ['#eebc2f'],
            chart: {
                height: 280,
                type: 'line'
            },
            title: {
                text: 'سنسور دما (1)'
            },
            /*subtitle: {
                text: 'دما'
            },*/
            xAxis: {
                categories: [<?php echo $data5; ?>],
                reversed: true
            },
            yAxis: {
                title: {
                    text: 'تغییرات دما'
                },
                min: 10,
                max: 45
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: false
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: '(1) دما',
                data: [<?php echo join(',',$data1 ); ?>]
            }]
        });
    </script>
    <script type="text/javascript">
        Highcharts.chart('lineC', {
            colors: ['#5bf8fd'],
            chart: {
                height: 280,
                type: 'line'
            },
            title: {
                text: 'سنسور دما (2)'
            },
            /*subtitle: {
                text: 'دما'
            },*/
            xAxis: {
                categories: [<?php echo $data5; ?>],
                reversed: true
            },
            yAxis: {
                title: {
                    text: 'تغییرات سنسور دما (2)'
                },
                min: 10,
                max: 45
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: false
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: '(2) دما',
                data: [<?php echo join(',',$data2 ) ?>]
            }]
        });
    </script>
    <script type="text/javascript">
        Highcharts.chart('lineD', {
            colors: ['#9e4892'],
            chart: {
                height: 280,
                type: 'line'
            },
            title: {
                text: 'سنسور دما (3)'
            },
            /*subtitle: {
                text: 'دما'
            },*/
            xAxis: {
                categories: [<?php echo $data5; ?>],
                reversed: true
            },
            yAxis: {
                title: {
                    text: 'تغییرات سنسور دما (3)'
                },
                min: 0,
                max: 20
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: false
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: '(3) دما',
                data: [<?php echo join(',',$data3 ) ?>]
            }]
        });
    </script>
    <script type="text/javascript">
        Highcharts.chart('lineE', {
            colors: ['#f26083'],
            chart: {
                height: 280,
                type: 'line'
            },
            title: {
                text: 'سنسور دما (4)'
            },
            /*subtitle: {
                text: 'دما'
            },*/
            xAxis: {
                categories: [<?php echo $data5; ?>],
                reversed: true
            },
            yAxis: {
                title: {
                    text: 'تغییرات سنسور دما (3)'
                },
                min: 0,
                max: 20
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: false
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: '(4) دما',
                data: [<?php echo join(',', $data4) ?>]
            }]
        });
    </script>
    <!--END HIGHCHART-->



    </body>

    </html>
    <?php
    $db->conn->close();

}
else{
    echo "<script>alert('Invalid information entered');</script>";
}

?>