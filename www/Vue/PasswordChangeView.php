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
                    <h2>Mot de passe oublié</h2>
                    <form>
                        <label>Ancien Mot de passe</label>
                        <div class="inputBox">
                            <input type="password" placeholder="Ancien mot de passe">
                        </div><br>
                        <label>Votre nouveau mot de passe</label>
                        <div class="inputBox">
                            <input type="password" placeholder="Nouveau mot de passe">
                        </div><br>
                        <label>Confirmation du mot de passe</label>
                        <div class="inputBox">
                            <input type="password"placeholder="Confirmation du mot de passe">
                        </div>
                        <div class="inputBox">
                            <input type="submit" value="Change">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
<?php
end_page();
?>