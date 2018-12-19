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
            $modifyFunc = "downgradeUser(event, ". $usersRow['id'] . ")";
        } else {
            $isAdmin = 'NO';
            $modifyAdmin = "icon_up.png";
            $modifyFunc ="promoteToAdmin(event, " . $usersRow['id'] .  ")";
        }
        //decide if the user can be promoted or downgraded and shows an icon accordingly
        if ($usersRow['admin'] == 1 && $usersRow['id'] == 1){
            $promotable = '<img src="../images/other/icon_minus.png">';
        } else {
            $promotable = '<a id="userMethod' . $usersRow['id'] . '" href="#" onclick="' . $modifyFunc . '"><img src="../images/other/' . $modifyAdmin . '"></a>';
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


}

if (isset($_GET['id']) && isset($_GET['method'])){
    switch ($_GET['method']){
        case 'promote':
            $promoteQuery = "UPDATE users SET admin = 1 WHERE id = '" . $_GET['id'] . "'";
            $connection->query($promoteQuery);
            echo "promoted";
            break;
        case 'downgrade':
            $query = "UPDATE users SET admin = NULL WHERE id = '" . $_GET['id'] . "'";
            $connection->query($query);
            echo "downgraded";
            break;
    }
}
/*function listOrders(){
    global $connection;
}*/