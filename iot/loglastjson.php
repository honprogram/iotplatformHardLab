<?php
header('Content-Type: application/json');

if (isset($_GET['tkn']) && !empty($_GET['tkn']) &&
    isset($_GET['id']) && !empty($_GET['id'])) {

    include_once 'classes/autoload.php';
    $db = new Database;
    $clientID = $_GET['id'];
    $token = $_GET['tkn'];
    $tableName = "id_" . $clientID;

    $query_SearchToken = "SELECT * FROM `user` u WHERE u.`clientID`='$clientID' AND u.`token`='$token'";
    if (mysqli_num_rows($result_SearchToken = $db->conn->query($query_SearchToken))) {
        $row_SearchToken=mysqli_fetch_assoc($result_SearchToken);
        $username=$row_SearchToken['username'];
        $query = "SELECT * FROM " . $tableName . " ORDER by `time_date` desc LIMIT 1";
        $result = mysqli_query($db->conn, $query);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            $jsonOutput = array(
                'username'=>$username,
                'clientID' => $row['clientID'],
                'ina' => $row['ina'],
                'inb' => $row['inb'],
                'inc' => $row['inc'],
                'ind' => $row['ind'],
                'ine' => $row['ine'],
                'inf' => $row['inf'],
                'ing' => $row['ing'],
                'inh' => $row['inh'],
                'sena' => $row['sena'],
                'senb' => $row['senb'],
                'senc' => $row['senc'],
                'send' => $row['send'],
                'sene' => $row['sene'],
                'senf' => $row['senf'],
                'seng' => $row['seng'],
                'senh' => $row['senh'],
                'time_date' => $row['time_date'],

            );

            echo json_encode($jsonOutput);
        }else {
            echo json_encode(array('status' => 'Not found Data'));
        }



    }else {
        echo json_encode(array('status' => 'Invalid information entered'));
    }

    $db->conn->close();

} else {
    echo json_encode(array('status' => 'Invalid information entered'));
}