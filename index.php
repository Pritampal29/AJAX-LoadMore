<?php

include ('dbcon.php');

$query = "SELECT * FROM `get_users_data` ORDER BY `id` LIMIT 3";
$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        .load-more{
            display:none;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container py-5 text-center">
        <div class="row">
            <div id="load_data" class="data">
                <h1>Dashboard</h1>

                <table id="dataTable" class="table border">
                    <thead class="table-dark">
                        <tr id="trowHead">
                            <th>Sl No</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($row=mysqli_fetch_assoc($result)) {
                            echo "<tr id='trowData'>
                            <td>".$row['id']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['email']."</td>
                        </tr>";
                            $id = $row['id'];
                        }
                        ?>

                        <tr id="loadBtnRow">
                            <td colspan=3>
                                <input type="button" value="Load More" id="lmBtn" class="btn btn-success"
                                    data-id="<?php echo $id;?>">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="load-more" id="load-more-icn">
                    <img src="skateboarding.gif" alt="">
                </div>
            </div>
        </div>
    </div>


    <script src="jquery.min.js"></script>
    <script src="ajax.js"></script>
</body>

</html>