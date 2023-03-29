<?php
//var_dump(http_response_code());
//include "../assets/class/auth.php"; //include auth.php file on all secure pages
include_once 'classes/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
            crossorigin="anonymous"></script>
    <style>
        * {
            align-items: center;
        }
    </style>
</head>
<body>
<div class=container-fluid>
    <div class="px-md-5">
        <div class="row " style="margin-top: 1%; padding-top:1%;">
            <form class="col-md-2 g-2 mx-auto card " method="POST" target="_blank"
                  action="http://hivaind.ir/test/surnameupdate.php"
                  _lpchecked="1">
                <h3>family</h3>
                <label class="form-label">
                    user name
                    <input class="form-control" type="text" placeholder="usr" name="usr">
                </label>
                <label class="form-label">
                    family
                    <input class="form-control" type="text" placeholder="family" name="family">
                </label>
                <input class=" btn btn-success" type="submit" value="update">

            </form>
            <br/>
            <form class="col-md-2 g-2 mx-auto card " method="GET" target="_blank"
                  action="http://hivaind.ir/wil/logidtable81.php"
                  _lpchecked="1">
                <h3>table WIL</h3>
                <label class="form-label">
                    clientID
                    <input class="form-control" type="text" placeholder="id" name="id">
                </label>
                <label class="form-label">
                    row:
                    <input class="form-control" type="text" placeholder="row" name="row">
                </label>
                <input class=" btn btn-success" type="submit" value="show">

            </form>
            <br/>
            <form class="col-md-2 g-2 mx-auto card " method="GET" target="_blank"
                  action="https://hivaind.ir/test/db-excel-v2.php"
                  _lpchecked="1">
                <h3>excel V2</h3>
                <label class="form-label">
                    clientID
                    <input class="form-control" type="text" placeholder="id" name="id">
                </label>
                <label class="form-label">
                    min:
                    <input class="form-control" type="date" placeholder="min" name="min">
                </label>  
                <label class="form-label">
                    max:
                    <input class="form-control" type="date" placeholder="max" name="max">
                </label>
                <input class=" btn btn-success" type="submit" value="show">

            </form>
            <br/> 
            <form class="col-md-2 g-2 mx-auto card " method="GET" target="_blank"
                  action="http://hivaind.ir/wil/logidtableTHWL.php"
                  _lpchecked="1">
                <h3>table THW_L</h3>
                <label class="form-label">
                    clientID
                    <input class="form-control" type="text" placeholder="id" name="id">
                </label>
                <label class="form-label">
                    row:
                    <input class="form-control" type="text" placeholder="row" name="row">
                </label>
                <input class=" btn btn-success" type="submit" value="show">

            </form>
            <br/>
            <form class="col-md-2 mx-auto g-2 card " method="GET" target="_blank"
                  action="http://hivaind.ir/wil/loglastjson81.php"
                  _lpchecked="1">
                <h3 class="card-title">log last json 81 </h3>
                <label class="form-label">
                    clientID:
                    <input class="form-control" type="text" placeholder="id" name="id">
                </label>

                <input class=" btn btn-success" type="submit" value="show">

            </form>
            <br/>
            

        </div>
        <div class="row " style="margin-top: 1%; padding-top:1%;">
            <form class="col-md-2 mx-auto g-2 card " method="GET" target="_blank"
                  action="http://hivaind.ir/crud/jsonIDconfig.php"
                  _lpchecked="1">
                <h3 class="card-title">json ID config</h3>
                <label class="form-label">
                    clientID:
                    <input class="form-control" type="text" placeholder="id" name="id">
                </label>

                <input class=" btn btn-success" type="submit" value="show">

            </form>
            <br/>
            <form class="col-md-2 mx-auto g-2 card " method="GET" target="_blank"
                  action="http://hivaind.ir/property/jsonIDproperty.php"
                  _lpchecked="1">
                <h3 class="card-title">json ID property </h3>
                <label class="form-label">
                    clientID:
                    <input class="form-control" type="text" placeholder="id" name="id">
                </label>

                <input class=" btn btn-success" type="submit" value="show">

            </form>
            <br/> 
            <form class="col-md-2 mx-auto g-2 card " method="GET" target="_blank"
                  action="http://hivaind.ir/wil/informationID.php"
                  _lpchecked="1">
                <h3 class="card-title">Information ID </h3>
                <label class="form-label">
                    clientID:
                    <input class="form-control" type="text" placeholder="id" name="id">
                </label>

                <input class=" btn btn-success" type="submit" value="show">

            </form>
            <br/>           
            <form class="col-md-2 mx-auto g-2 card " method="GET" target="_blank"
                  action="http://hivaind.ir/crud/idconnect.php"
                  _lpchecked="1">
                <h3 class="card-title">connect ID </h3>
                <label class="form-label">
                    clientID:
                    <input class="form-control" type="text" placeholder="delay" name="d">
                </label>

                <input class=" btn btn-success" type="submit" value="show">

            </form>
            <br/>

        </div>

    </div>


    <div class="row" style="margin-top: 1%; padding-top:1%;">
        <div class="col-md-3 btn-group-vertical mx-auto">
            <a class=" btn btn-outline-secondary" href="http://hivaind.ir/crud/thwform-admin.php" target="_blank">THW
                form admin</a>
            <a class=" btn btn-outline-secondary" href="http://hivaind.ir/crud/thwform-user.php" target="_blank">THW
                form user</a>
            <a class=" btn btn-outline-secondary" href="http://hivaind.ir/property/form-project.php"
               target="_blank">Project change form</a>
            <a class=" btn btn-outline-secondary" href="http://hivaind.ir/property/tableproperty.php"
               target="_blank">table property</a>
            <a class=" btn btn-outline-secondary" href="http://hivaind.ir/crud/config_admin2.php" target="_blank">WIL
                form admin</a>
            <a class=" btn btn-outline-secondary" href="http://hivaind.ir/crud/all-ID.php" target="_blank">All
                ID Json</a>
            <a class=" btn btn-outline-secondary" href="http://hivaind.ir/crud/gswID.php" target="_blank">gswID</a>
            <a class=" btn btn-outline-secondary" href="http://hivaind.ir/property/form-property.php" target="_blank">form property</a>
            <a class=" btn btn-outline-secondary" href="http://hivaind.ir/property/all-ID-ui.php" target="_blank">All ID</a>
        </div>
        <br/>
    </div>


</div>
</body>
</html>