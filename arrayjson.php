<?php
header('Content-Type: application/json');

if (isset($_GET['tkn']) && !empty($_GET['tkn']) &&
    isset($_GET['id']) && !empty($_GET['id']) &&
    isset($_GET['in']) && !empty($_GET['in']) &&
    isset($_GET['row']) && !empty($_GET['row'])) {

    include_once 'classes/autoload.php';
    $db = new Database;
    $clientID = $_GET['id'];
    $token = $_GET['tkn'];
    $rowCount=abs($_GET['row']);
    $in=$_GET['in'];
    $tableName = "id_" . $clientID;
    $i=0;

    $query_SearchToken = "SELECT * FROM `user` u WHERE u.`clientID`='$clientID' AND u.`token`='$token'";
    if (mysqli_num_rows($result_SearchToken = $db->conn->query($query_SearchToken))) {

        $query = "SELECT ".$in." FROM " . $tableName . " ORDER by `time_date` desc LIMIT ".$rowCount;
        $result = mysqli_query($db->conn, $query);
        if (mysqli_num_rows($result)) {
            while($row=mysqli_fetch_assoc($result)){
                foreach($row as $value){
                    $x[$i]=$value;
                    $i++;
                }
            }

            echo json_encode(array($in=>$x));
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