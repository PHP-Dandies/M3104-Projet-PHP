<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include '../HelperUtils.php';
start_page("test");
navbar();
?>
        <section>
            <div class="color"></div>
            <div class="color"></div>
            <div class="color"></div>
            <div class="box">
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
                               <input type="submit" value="Connexion">
                           </div>
                           <p class="forget">Mot de passe oublié ?<a href="#">Clique Ici</a> </p>
                       </form>
                   </div>
               </div>
            </div>
        </section>
<?php
end_page();
?>