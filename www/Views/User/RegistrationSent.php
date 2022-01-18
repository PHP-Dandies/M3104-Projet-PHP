<?php
start_page("test");
navbar();
/** @var array $data */
if(isset($loginError))
    $loginError = $data["loginError"];
?>
<section>
    <div class="box">
        <div class="square" style="--i:0;"></div>
        <div class="square" style="--i:1;"></div>
        <div class="square" style="--i:2;"></div>
        <div class="square" style="--i:3;"></div>
        <div class="square" style="--i:4;"></div>
        <div class="container2">
            <h2>Votre demande a bien été envoyé à un administrateur!</h2>
        </div>
    </div>
</section>
