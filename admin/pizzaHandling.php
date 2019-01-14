<?php
require_once '../config.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

} else {
    header('Location: ../index.php');
}

function listPizzas(){
    global $connection;
    $pizzaListQuery = "SELECT * FROM pizzas";
    $pizzaListResult = $connection->query($pizzaListQuery);
    echo '<table id="pizzaListTable" class="usersListTable">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>description</th>
            <th>price</th>
            <th>image</th>
            <th>actions</th>
        </tr>
        <tbody>';
    while ($pizzasRow = $pizzaListResult->fetch_assoc()) {
        echo
            '<tr>
                <td>' . $pizzasRow['id'] . '</td>
                <td>' . $pizzasRow['name'] . '</td>
                <td>' . $pizzasRow['description'] . '</td>
                <td>' . $pizzasRow['price'] . '</td>
                <td><img src="../' . $pizzasRow['imageLink'] . '"></td>
                <td></td>
            </tr>';
    }
    echo '</tbody></table>';
}