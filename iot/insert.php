<?php
header('Content-Type: application/json');

if (
    isset($_GET['tkn']) && !empty($_GET['tkn']) &&
    isset($_GET['id']) && !empty($_GET['id'])
) {

    include_once 'classes/autoload.php';
    $db = new Database;

    $clientID = $_GET['id'];
    $token = $_GET['tkn'];
    $tableName = "id_" . $clientID;
    $date = date("Y-m-d", time());
    $timestamp = time();
    $infoID = $db->conn->query("SELECT * FROM `user` WHERE `token`='$token' AND `clientID`='$clientID'");
    if ($infoID->num_rows > 0) {
        $res = mysqli_fetch_assoc($infoID);
        $lastData = $db->conn->query("SELECT * FROM " . $tableName . " where `time_date` LIKE '$date%'");
        if ($lastData->num_rows > 0) {
            $row = mysqli_fetch_assoc($lastData);
        }
        if ($lastData->num_rows < 1000) {
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                //ip from share internet
                $clientIP = $_SERVER['HTTP_CLIENT_IP'];
            } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                //ip pass from proxy
                $clientIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else if (!empty($_SERVER['REMOTE_ADDR'])) {
                $clientIP = $_SERVER['REMOTE_ADDR'];
            }

            if (isset($_GET['ina'])) {
                $ina = $_GET['ina'];
            } elseif ($row != null) {
                $ina = $row['ina'];
            } else {
                $ina = '0';
            }

            if (isset($_GET['inb'])) {
                $inb = $_GET['inb'];
            } elseif ($row != null) {
                $inb = $row['inb'];
            } else {
                $inb = '0';
            }

            if (isset($_GET['inc'])) {
                $inc = $_GET['inc'];
            } elseif ($row != null) {
                $inc = $row['inc'];
            } else {
                $inc = '0';
            }

            if (isset($_GET['ind'])) {
                $ind = $_GET['ind'];
            } elseif ($row != null) {
                $ind = $row['ind'];
            } else {
                $ind = '0';
            }

            if (isset($_GET['ine'])) {
                $ine = $_GET['ine'];
            } elseif ($row != null) {
                $ine = $row['ine'];
            } else {
                $ine = '0';
            }

            if (isset($_GET['inf'])) {
                $inf = $_GET['inf'];
            } elseif ($row != null) {
                $inf = $row['inf'];
            } else {
                $inf = '0';
            }

            if (isset($_GET['ing'])) {
                $ing = $_GET['ing'];
            } elseif ($row != null) {
                $ing = $row['ing'];
            } else {
                $ing = '0';
            }

            if (isset($_GET['inh'])) {
                $inh = $_GET['inh'];
            } elseif ($row != null) {
                $inh = $row['inh'];
            } else {
                $inh = '0';
            }

            if (isset($_GET['sena'])) {
                $sena = $_GET['sena'];
            } elseif ($row != null) {
                $sena = $row['sena'];
            } else {
                $sena = 'off';
            }

            if (isset($_GET['senb'])) {
                $senb = $_GET['senb'];
            } elseif ($row != null) {
                $senb = $row['senb'];
            } else {
                $senb = 'off';
            }

            if (isset($_GET['senc'])) {
                $senc = $_GET['senc'];
            } elseif ($row != null) {
                $senc = $row['senc'];
            } else {
                $senc = 'off';
            }

            if (isset($_GET['send'])) {
                $send = $_GET['send'];
            } elseif ($row != null) {
                $send = $row['send'];
            } else {
                $send = 'off';
            }

            if (isset($_GET['sene'])) {
                $sene = $_GET['sene'];
            } elseif ($row != null) {
                $sene = $row['sene'];
            } else {
                $sene = 'off';
            }

            if (isset($_GET['senf'])) {
                $senf = $_GET['senf'];
            } elseif ($row != null) {
                $senf = $row['senf'];
            } else {
                $senf = 'off';
            }

            if (isset($_GET['seng'])) {
                $seng = $_GET['seng'];
            } elseif ($row != null) {
                $seng = $row['seng'];
            } else {
                $seng = 'off';
            }

            if (isset($_GET['senh'])) {
                $senh = $_GET['senh'];
            } elseif ($row != null) {
                $senh = $row['senh'];
            } else {
                $senh = 'off';
            }
            $queryInsert = $db->conn->query("INSERT INTO " . $tableName . "( `clientID`, `ip`, `ina`, `inb`, `inc`, `ind`, `ine`, `inf`, `ing`, `inh`, `sena`, `senb`, `senc`, `send`, `sene`, `senf`, `seng`, `senh`,`timestamp`) VALUES ('$clientID','$clientIP','$ina','$inb','$inc','$ind','$ine','$inf','$ing','$inh','$sena','$senb','$senc','$send','$sene','$senf','$seng','$senh','$timestamp')");
            if ($queryInsert) {
                echo json_encode(
                    array(
                        'status' => 'data inserted',
                        'ina' => $ina,
                        'inb' => $inb,
                        'inc' => $inc,
                        'ind' => $ind,
                        'ine' => $ine,
                        'inf' => $inf,
                        'ing' => $ing,
                        'inh' => $inh,
                        'sena' => $sena,
                        'senb' => $senb,
                        'senc' => $senc,
                        'send' => $send,
                        'sene' => $sene,
                        'senf' => $senf,
                        'seng' => $seng,
                        'senh' => $senh,
                        'date' => date("Y-m-d"),
                        'time' => date('H:i:s')
                    )
                );
            } else {
                echo json_encode(array('status' => 'data not inserted'));
            }
        } else {
            echo json_encode(array('status' => 'Each ID is allowed to send 500 data per day'));
        }
    } else {
        echo json_encode(array('status' => 'User not found Please contact support'));
    }
} else {
    echo json_encode(array('status' => 'Invalid information entered'));
}
