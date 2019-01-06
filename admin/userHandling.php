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
            <th>actions</th>
        </tr>
        <tbody>';
    while($usersRow = $userListResult->fetch_assoc()) {
        //print out if the listed user is admin or not
        if ($usersRow['admin'] == 1){
            $isAdmin = 'YES';
            $modifyAdmin = "downgrade.png";
            $modifyFunc = "downgradeUser(event, ". $usersRow['id'] . ")";
        } else {
            $isAdmin = 'NO';
            $modifyAdmin = "upgrade.png";
            $modifyFunc ="promoteToAdmin(event, " . $usersRow['id'] .  ")";
        }
        //decide if the user can be promoted or downgraded and shows an icon accordingly
        $deleteUser = $promotable = "";
        //
        if ($usersRow['admin'] == 1 && $usersRow['id'] == 1){
            $promotable = '<img src="../images/other/no_action.png">';
        } else {
            $promotable = '<a id="userMethod' . $usersRow['id'] . '" href="#" onclick="' . $modifyFunc . '"><img src="../images/other/' . $modifyAdmin . '"></a>';
            $deleteUser = '<a href="#" onclick="deleteUser(event, ' . $usersRow['id'] . ')"><img src="../images/other/trash.png"></a>';
        }
        //print out the table with the data
        echo
            '<tr>
                <td>' . $usersRow['id'] . '</td>
                <td>' . $usersRow['username'] . '</td>
                <td>' . $usersRow['email'] . '</td>
                <td>' . $isAdmin . '</td>
                <td>' . $promotable . $deleteUser . '</td>
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
            $downgradeQuery = "UPDATE users SET admin = NULL WHERE id = '" . $_GET['id'] . "'";
            $connection->query($downgradeQuery);
            echo "downgraded";
            break;
        case 'delete':
            $deleteQuery = "DELETE FROM users WHERE id = '" . $_GET['id'] . "'";
            $connection->query($deleteQuery);
            echo "deleted";
            break;
    }
}
/*function listOrders(){
    global $connection;
}*/