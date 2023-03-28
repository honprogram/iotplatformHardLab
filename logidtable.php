<?php
if (isset($_GET['tkn']) && !empty($_GET['tkn']) &&
    isset($_GET['id']) && !empty($_GET['id']) &&
    isset($_GET['row']) && !empty($_GET['row'])) {

    include_once 'classes/autoload.php';
    $db = new Database;
    $clientID = $_GET['id'];
    $token = $_GET['tkn'];
    $rowCount = abs($_GET['row']);
    $tableName = "id_" . $clientID;

    $query_SearchToken = "SELECT * FROM `user` u WHERE u.`clientID`='$clientID' AND u.`token`='$token'";
    if (mysqli_num_rows($result_SearchToken = $db->conn->query($query_SearchToken))) {

        $query = "SELECT * FROM " . $tableName . " ORDER by `time_date` desc LIMIT " . $rowCount;
        $result = mysqli_query($db->conn, $query);
        if (mysqli_num_rows($result)) {
            ?>
            <!Doctype HTML>
            <html>
            <head>
                <title>Table</title>
                <link rel="stylesheet" href="asset/css/bootstrap.css"/>
            </head>
            <body>

            <button type="button" class="btn btn-info m-1"> clientID=<?php echo $clientID ?></button>
            <br>
            <button type="button" class="btn btn-info m-1"> last row =<?php echo $rowCount ?> </button>
            <br>

            <table class="table table-striped table-bordered">
                <tr>
                    <th scope="col">row</th>
                    <th scope="col">clientID</th>
                    <th scope="col">inA</th>
                    <th scope="col">inB</th>
                    <th scope="col">inC</th>
                    <th scope="col">inD</th>
                    <th scope="col">inE</th>
                    <th scope="col">inF</th>
                    <th scope="col">inG</th>
                    <th scope="col">inH</th>

                    <th scope="col">senA</th>
                    <th scope="col">senB</th>
                    <th scope="col">senC</th>
                    <th scope="col">senD</th>
                    <th scope="col">senE</th>
                    <th scope="col">senF</th>
                    <th scope="col">senG</th>
                    <th scope="col">senH</th>

                    <th scope="col">time</th>
                    <th scope="col">date</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                    <tr>

                        <td><?= $row['ID'] ?></td>
                        <td><?= $row['clientID'] ?></td>
                        <td><?= $row['ina'] ?></td>
                        <td><?= $row['inb'] ?></td>
                        <td><?= $row['inc'] ?></td>
                        <td><?= $row['ind'] ?></td>
                        <td><?= $row['ine'] ?></td>
                        <td><?= $row['inf'] ?></td>
                        <td><?= $row['ing'] ?></td>
                        <td><?= $row['inh'] ?></td>

                        <td><?= $row['sena'] ?></td>
                        <td><?= $row['senb'] ?></td>
                        <td><?= $row['senc'] ?></td>
                        <td><?= $row['send'] ?></td>
                        <td><?= $row['sene'] ?></td>
                        <td><?= $row['senf'] ?></td>
                        <td><?= $row['seng'] ?></td>
                        <td><?= $row['senh'] ?></td>


                        <td><?php
                            $newDate = date("H:i:s", strtotime($row['time_date']));
                            echo $newDate;
                            ?></td>
                        <td><?php
                            $newDate = date("Y-m-d", strtotime($row['time_date']));
                            echo $newDate;
                            ?></td>

                    </tr>

                    <?php
                }
                $db->conn->close();
                ?>
            </table>
            </body>
            </html>


            <?php

        } else {
        echo '<script type="text/javascript"> alert("Not Found Data"); </script>';
        }


    } else {
        echo '<script type="text/javascript"> alert("User not found Please contact support"); </script>';
    }

} else {
    echo '<script type="text/javascript"> alert("The requested information was not entered correctly"); </script>';

}

?>