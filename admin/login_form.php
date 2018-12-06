<div class="loginPage">
                        <div id="logRegForm" class="logRegForm">
                            <form action="" class="register-form" id="register-form" method="POST">
                                <input name="regUsername" placeholder="username" type="text" autocomplete="username"/>
                                <input name="regPassword" placeholder="password" type="password" autocomplete="current-password"/>
                                <input name="regEmail" placeholder="email address" type="text" autocomplete="email"/>
                                    <?php
                                        include "register.php";
                                    ?>
                                <button name="submit" type="submit" value="Submit">create</button>
                                <p class="message">Already registered? <a href="#">Sign In</a></p>
                            </form>
                            <form action="" class="login-form" method="POST">
                                <input name="username" placeholder="username" type="text" autocomplete="username"/>
                                <input name="password" placeholder="password" type="password" autocomplete="current-password"/>
                                    <?php
                                        include "login.php";
                                    ?>
                                <button name="submit" type="submit" value="Submit">login</button>
                                <p class="message">Not registered? <a href="#">Create an account</a></p>
                            </form>
                            <div id="errorMessage" class="errorMessage" style="display: none">
                                <p>Invalid data!</p>
                            </div>
                        </div>
                    </div>