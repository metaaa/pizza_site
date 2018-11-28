<p>&nbsp;</p>
<p id="pageTitle" class="pageTitle">Our Pizzas</p>
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
                    '<strong>' . $resultRow['name'] . '</strong><br>'
                    . '</div>';
            }
        }
    ?>
</div>