<?php

start_page("test");
navbar();
?>
    <div class="container" style="margin-top: 5px">
        <div class="is-vertical-align is-horizontal-align" style="margin-top: 5px; height: 20vh; background-image: url('../../Images/0.jpg'); background-position: center; background-size: cover;">
            <h1 class="text-uppercase" style="background-color: rgba(160, 160, 160, 0.64); padding: 5px; color: white"><input type="text" placeholder="Insérer le titre"></h1>
        </div>
        <div>
            <div class="row" style="margin-top: 5px">
                <div class="col-8">
                    <textarea rows="15" placeholder="Ecrivez la description de voter projet ici" maxlength="500"></textarea>
                </div>
                <div class="col-4">
                    <div class="card">
                        <h3><input type="text" placeholder="Nom organisateur"></h3>
                        <progress value="60" max="100"></progress>
                        <p class="is-horizontal-align">XXX sur <input type="text" placeholder="Max point" style="width:20px;height:20px;">  pts</p>
                    </div>
                    <br>
                    <a class="button primary">+ Contenu Débloquable </a>
                </div>
            </div>
        </div>
    </div>
<?php
end_page();
?>