<?php
    $doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
    include '../../Utils/HelperUtils.php';
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
                <form action method="post">
                    <h1><strong>Votre image</strong>avec votre idée</h1>
                    <div class="group">
                        <label for="title">Titre <span>Utilisez les majuscules pour obtenir un meilleur résultat</span></label>
                        <input type="text" name="title" id="title" class="controll"/>
                    </div>
                    <div class="group">
                        <label for="caption">Description <span>Un description très simple</span></label>
                        <input type="text" name="caption" id="caption" class="controll">
                    </div>
                    
                    <div class="group file_area">
                        <label for="images">Images <span>Une image lisible s'il vous plait</span></label>
                        <input type="file" name="images" id="images" required="required" multiple="multiple">
                        <div class="dummy">
                            <div class="succes">Parfait, votre image a été enregistré. Continuez</div>
                            <div class="default">Sélectionner votre image</div>
                        </div>
                    </div>

                    <div class="group">
                        <button type="submit">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php
    end_page();
?>
