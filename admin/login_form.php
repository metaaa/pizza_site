<div class="loginPage">
                        <div class="logRegForm">
                            <form action="" class="register-form" id="register-form" method="POST">
                                <input name="regUsername" placeholder="username" type="text"/>
                                <input name="regPassword" placeholder="password" type="password"/>
                                <input name="regEmail" placeholder="email address" type="text"/>
                                <?php
                                include "admin/register.php";
                                ?>
                                <button>create</button>
                                <p class="message">Already registered? <a href="#">Sign In</a></p>
                            </form>
                            <form action="" class="login-form" method="POST">
                                <input name="username" placeholder="username" type="text"/>
                                <input name="password" placeholder="password" type="password"/>
                                <?php
                                include "admin/login.php";
                                ?>
                                <button>login</button>
                                <p class="message">Not registered? <a href="#">Create an account</a></p>
                            </form>
                        </div>
                    </div>