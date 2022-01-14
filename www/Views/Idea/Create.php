<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include_once $doc_root.'/../Utils/HelperUtils.php';
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
                <form action="../../Scripts/AddIdeaToDb.php" method="post">
                    <h1>Votre Idée</h1>
                    <div class="group">
                        <label for="title">Titre</label>
                        <input type="text" name="title" id="title" required/>
                    </div>
                    <div class="group">
                        <label for="caption">Description</label>
                        <textarea name="caption" id="caption" required></textarea>
                    </div>
                    <div class="group">
                        <label for="goal">Goal</label>
                        <input type="number" name="goal" id="goal" required/>
                    </div>
                    <div class="group file_area">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" required/>
                    </div>

                    <div class="group">
                        <input type="submit" name="test" value="Enregister">
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php
end_page();
?>
