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
                <a class="trigger"><img src="../images/other/plus.png"></a>
                <div class="modal">
                    <div class="modal-content">
                        <span class="modalHeader"> Add User</span>
                        <span class="close-button">×</span>
                        <form class="userAddForm" action="" method="POST" onsubmit="">
                            <input id="addUsrName" name="addUsrName" placeholder="username" type="text"/>
                            <input id="addUsrEmail" name="addUsrEmail" placeholder="email" type="text"/>
                            <input id="addUsrAdmin" class="addUsrAdmin" name="addUsrAdmin" type="checkbox" value="yes"><span class="usrAddAdminTitle">Admin</span>
                            <button class="addUsrSubmit" type="submit" value="submit">Submit</button>
                        </form>
                    </div>
                </div>

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
