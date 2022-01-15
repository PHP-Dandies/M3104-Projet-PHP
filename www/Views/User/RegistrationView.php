<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include $doc_root . '/Utils/HelperUtils.php';
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
                <h2>Inscription</h2>
                <form>
                    <label>Email</label>
                    <div class="inputBox">
                        <input type="email" placeholder="Votre email">
                    </div><br>
                    <label>Mot de passe</label>
                    <div class="inputBox">
                        <input type="password" placeholder="Votre mot de passe">
                    </div><br>
                    <label>Confirmation du mot de passe</label>
                    <div class="inputBox">
                        <input type="password" placeholder="Retapez votre mot de passe">
                    </div><br>
                    <label>Pseudo</label>
                    <div class="inputBox">
                        <input type="text" placeholder="Votre pseudo">
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Fin">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
end_page();
?>
