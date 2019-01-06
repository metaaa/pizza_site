<?php
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        //request data from the database which can be seen by the user
        include 'userHandling.php';
        include 'pizzaHandling.php';

    } else {
        header('Location: ../index.php');
}
?>



<div id="tabbedArea" class="tabbedArea">
    <main>
        <input id="tab1" type="radio" name="tabs" checked><label for="tab1">Orders</label>
        <input id="tab2" type="radio" name="tabs"><label for="tab2">User Administration</label>
        <input id="tab3" type="radio" name="tabs"><label for="tab3">Menu</label>
        <input id="tab4" type="radio" name="tabs"><label for="tab4">Statistics</label>

        <section id="content1">
asd
        </section>
        <section id="content2" class="content2">
            <div class="userAdd">
                <a id="userAddBtn" href="#" onclick=""><img src="../images/other/plus.png" alt="Add User"></a>
            </div>
            <?php
                listUsers();
            ?>
        </section>
        <section id="content3">
            <?php
                listPizzas();
            ?>
        </section>
        <section id="content4">
            xcv
        </section>
    </main>
</div>
