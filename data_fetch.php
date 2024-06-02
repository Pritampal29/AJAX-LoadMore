<?php
include ('dbcon.php');


$last_query = "SELECT max(id) as last_id FROM `get_users_data`";
$last_res = mysqli_query($conn, $last_query);
$last_row = mysqli_fetch_assoc($last_res);
$lastId = $last_row['last_id'];

// function getLastId() {
//     global $conn;
//     $last_query = "SELECT max(id) as last_id FROM `get_users_data`";
//     $last_res = mysqli_query($conn, $last_query);
//     $last_row = mysqli_fetch_assoc($last_res);
//     return $last_row['last_id'];
// }


if(isset ($_POST['id'])){
    $id = $_POST['id'];
}

$query = "SELECT * FROM `get_users_data` WHERE id>$id LIMIT 2";
$result = mysqli_query($conn,$query);

$fetch = "";

while($row=mysqli_fetch_assoc($result)){
    $fetch .= "<tr id='trowData'>
            <td>".$row['id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
        </tr>";
    $id = $row['id'];
}

if($id < $lastId) {
    $fetch .= "<tr id='loadBtnRow'>
                <td colspan=3>
                    <input type='button' value='Load More' id='lmBtn' class='btn btn-success'
                        data-id=$id>
                </td>
            </tr>";
}

        sleep(1);
        echo $fetch;