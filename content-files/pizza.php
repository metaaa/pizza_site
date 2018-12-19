<p>&nbsp;</p>
<p id="pageTitle" class="pageTitle">Our Pizzas</p>
<p>&nbsp;</p>
<div class="gridContainer">
    <?php

        //select all the pizzas from the db
        $sqlQuery = "SELECT * FROM pizzas";
        $queryResult = $connection->query($sqlQuery);
        if ($queryResult->num_rows > 0) {
            $countOfResults = $queryResult->num_rows;
            for ($i = 0; $i < $countOfResults; $i++){
                $resultRow = $queryResult->fetch_assoc();
                echo '<div class="gridItem">
                        <table>
                            <tr>
                                <td colspan="3"><img class="pizzaImage" src="' . $resultRow['imageLink'] . '"></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="pizzaName">' . $resultRow['name'] . '</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="pizzaDesc">' . $resultRow['description'] . '</td>
                            </tr>
                            <tr  class="pizzaPrice">
                                <td>Price: </td>
                                <td class="pizzaPriceText">' . $resultRow['price'] . ' Ft</td>
                                <td class="pizzaCartImage"><img src="images/shop/cart.png"></td>
                            </tr>
                        </table>
                    </div>';
            }
        } else {
            echo "No pizzas yet. :(";
        }
    ?>
</div>