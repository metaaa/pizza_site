<?php
require_once '../config.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
    header('Location: ../index.php');
}

function listUsers() {
    global $connection;
    $userListQuery = "SELECT * FROM users";
    $userListResult = $connection->query($userListQuery);
    echo '<table id="usersListTable" class="usersListTable">
        <tr>
            <th>id</th>
            <th>username</th>
            <th>email</th>
            <th>admin</th>
            <th>promote/revoke</th>
        </tr>
        <tbody>';
    while($usersRow = $userListResult->fetch_assoc()) {
        //print out if the listed user is admin or not
        if ($usersRow['admin'] == 1){
            $isAdmin = 'YES';
            $modifyAdmin = "icon_down.png";
            $modifyFunc = "downgradeUser(event)";
        } else {
            $isAdmin = 'NO';
            $modifyAdmin = "icon_up.png";
            $modifyFunc ="promoteToAdmin(event)";
        }
        //decide if the user can be promoted or downgraded and shows an icon accordingly
        if ($usersRow['admin'] == 1 && $usersRow['id'] == 1){
            $promotable = '<img src="../images/other/icon_minus.png">';
        } else {
            $promotable = '<a href="?id=' . $usersRow['id'] . '" onclick="' . $modifyFunc . '"><img src="../images/other/' . $modifyAdmin . '"></a>';
        }
        //print out the table with the data
        echo
            '<tr>
                <td>' . $usersRow['id'] . '</td>
                <td>' . $usersRow['username'] . '</td>
                <td>' . $usersRow['email'] . '</td>
                <td>' . $isAdmin . '</td>
                <td>' . $promotable . '</td>
            </tr>';
    }
    echo '</tbody></table>';
    //make upgrade/downgrade buttons work for jquery post method
    //if (isset($_POST['method'])){

        /*switch ($_POST['method']){
            case 'promoteUser':
                promoteToAdmin(2);
                break;
            case 'downgradeUser':
                downgradeToUser(2);
                break;
        }*/
    //}
}
/*$userId = $_GET['id'];
echo '<script>console.log(' . json_encode($userId) . ')</script>';

function promoteToAdmin($userId){
    global $connection;
    $query = "UPDATE users SET admin = 1 WHERE id = '$userId'";
    $connection->query($query);
}

function downgradeToUser($userId){
    global $connection;
    $query = "UPDATE users SET admin = NULL WHERE id = '$userId'";
    $connection->query($query);
}*/

/*function listOrders(){
    global $connection;
}*/