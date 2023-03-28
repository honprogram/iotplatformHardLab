<?php

include_once 'classes/autoload.php';
$db = new Database;

$query = "SELECT * FROM `user`";

if (mysqli_num_rows($result = $db->conn->query($query))) {
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap 5 Hoverable rows Datatable Example</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- bootstrap5 dataTables css cdn -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.11.5/dataTables.bootstrap5.min.css" integrity="sha512-160haaGB7fVnCfk/LJAEsACLe6gMQMNCM3Le1vF867rwJa2hcIOgx34Q1ah10RWeLVzpVFokcSmcint/lFUZlg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>

  <body>
    <div class="container mt-4">
      <table
        id="datatable"
        class="table table-hover table-striped"
      >
        <thead>
          <tr>
            <th scope="col">row</th>
            <th scope="col">clientID</th>
            <th scope="col">username</th>
            <th scope="col">token</th>
            <th scope="col">expire</th>
          </tr>
        </thead>
        <tbody>
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

        </tbody>
      </table>
    </div>
    <!-- bootstrap5 dataTables js cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.11.5/dataTables.bootstrap5.min.js" integrity="sha512-nfoMMJ2SPcUdaoGdaRVA1XZpBVyDGhKQ/DCedW2k93MTRphPVXgaDoYV1M/AJQLCiw/cl2Nbf9pbISGqIEQRmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
      $(document).ready(function () {
        $('#datatable').DataTable();
      });
    </script>
  </body>
</html>
<?php

} else {
    exit('Not Found Data');
}


?>