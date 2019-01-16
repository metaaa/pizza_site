<?php
require_once "../config.php";
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
        $deleteUser = $modifyUser = $promotable = "";
        //
        if ($usersRow['admin'] == 1 && $usersRow['id'] == 1){
            $promotable = '<img src="../images/other/no_action.png">';
        } else {
            $promotable = '<a id="userMethod' . $usersRow['id'] . '" href="#" onclick="' . $modifyFunc . '"><img src="../images/other/' . $modifyAdmin . '"></a>';
            $deleteUser = '<a href="#" onclick="deleteUser(event, ' . $usersRow['id'] . ')"><img src="../images/other/trash.png"></a>';
            $modifyUser = '<a href="#" onclick="modifyUser(event, ' . $usersRow['id'] . ')"><img src="../images/other/edit.png"></a>';
        }
        //print out the table with the data
        echo
            '<tr>
                <td>' . $usersRow['id'] . '</td>
                <td>' . $usersRow['username'] . '</td>
                <td>' . $usersRow['email'] . '</td>
                <td>' . $isAdmin . '</td>
                <td>' . $promotable . $deleteUser . $modifyUser . '</td>
            </tr>';
    }
    echo '</tbody></table>';
}

/*function newUser(){
    global $connection;
    $newUserQuery ="CREATE";
    $connection->query($newUserQuery);
    echo "user_created";
}*/


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

if (isset($_POST['addUser']) && isset($_POST['addEmail'])){
    $newUsername = $_POST['addUser'];
    $newUserEmail = $_POST['addEmail'];
    $newUserAdmin = $_POST['addAdmin'];
    $nameCheckQuery = "SELECT username,email FROM users WHERE username = '$newUsername' OR email = '$newUserEmail'";
    $checkQueryResult = $connection->query($nameCheckQuery);
    if ($checkQueryResult->num_rows > 0){
        $resultRow = $checkQueryResult->fetch_assoc();
        //check whether the username or the email is taken
        if ($newUsername == $resultRow["username"] && $newUserEmail !== $resultRow["email"]){
            echo("username_error");
        } elseif ($newUsername !== $resultRow["username"] && $newUserEmail == $resultRow["email"]) {
            echo("email_error");
        }
        //checks if the email is valid
    } elseif (!filter_var($newUserEmail, FILTER_VALIDATE_EMAIL)){
        echo "invalid_email";
    } else {
        //generate random password
        random_password(8);
        //insert into the database
        if ($newUserAdmin = ""){
            $newUserAdmin = NULL;
        } else {
            $newUserAdmin = 1;
        }
        $newUserQuery = "INSERT INTO users (username, email, admin) VALUES ($newUsername, $newUserEmail, $newUserAdmin)";
        $connection->query($newUserQuery);
        echo "new_user_added";
    }
}

function random_password( $length ) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_-/!";
    return substr(str_shuffle($chars),0,$length);
}
/*function listOrders(){
    global $connection;
}*/