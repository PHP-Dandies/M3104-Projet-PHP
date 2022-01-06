<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include '../HelperUtils.php';
start_page("test");
navbar();
?>
    <section>
        <div class="box">
            <div class="square" style="--i:0;"></div>
            <div class="square" style="--i:1;"></div>
            <div class="square" style="--i:2;"></div>
            <div class="square" style="--i:3;"></div>
            <div class="square" style="--i:4;"></div>
            <div class="container2">
                <div class="form">
                    <h2>Login</h2>
                    <form>
                        <div class="inputBox">
                            <input type="text" placeholder="Identifiant">
                        </div>
                        <div class="inputBox">
                            <input type="password" placeholder="Mot de Passe">
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Login">
                        </div>
                        <p class="forget">Mot de passe oublié ? <a href="PasswordChangeView.php">Clique Ici</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php
end_page();
?>