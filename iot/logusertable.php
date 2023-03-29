<?php

include_once 'classes/autoload.php';
$db = new Database;

$query = "SELECT * FROM `user` ORDER BY `ID` DESC";

if (mysqli_num_rows($result = $db->conn->query($query))) {
    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
        <title>User Table</title>
        <link rel="stylesheet" href="asset/css/bootstrap.css">
    </head>
    <body class="container-fluid mt-3">

    <table class="table table-striped table-bordered">
        <tr>
            <th scope="col">row</th>
            <th scope="col">clientID</th>
            <th scope="col">username</th>
            <th scope="col">token</th>
            <th scope="col">expire</th>

        </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?=$row['ID'] ?></td>
            <td><?=$row['clientID'] ?></td>
            <td><?=$row['username'] ?></td>
            <td><?=$row['token'] ?></td>
            <td><?=$row['expire'] ?></td>
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
    exit('Not Found Data');
}


?>