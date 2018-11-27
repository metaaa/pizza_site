<p>&nbsp;</p>
<h1>Pizzas</h1>
<div class="gridContainer">
    <?php
        //select all the pizzas from the db
        $sqlQuery = "SELECT * FROM pizzas";
        $queryResult = $connection->query($sqlQuery);
        if ($queryResult->num_rows > 0) {
            $countOfResults = $queryResult->num_rows;
            for ($i = 0; $i < $countOfResults; $i++){
                $resultRow = $queryResult->fetch_assoc();
                echo '<div class="gridItem">' .
                    '<img src="' . $resultRow['imageLink'] . '">' .
                    '<h6>' . $resultRow['name'] . '</h6>'
                    . '</div>';
            }
        }
    ?>
</div>