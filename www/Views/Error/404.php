<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include substr($doc_root,0, -6) . '/Utils/HelperUtils.php';
start_page("Error 404");
?>
    <div id="container4">
        <div class="content">
            <h2>404</h2>
            <h4>Oops! Page not found</h4>
            <p>Cette page n'existe pas ou ne trouve pas ce que vous demandez.</p>
            <a href="#">Back to home</a>
        </div>
    </div>
    <script type="text/javascript">
        let container4 = document.getElementById('container4');
        window.onmousemove = function(e){
            let x = - e.clientX/5,
                y = - e.clientY/5;
            container4.style.backgroundPositionX = x + 'px';
            container4.style.backgroundPositionY = y + 'px';
        }
    </script>

<?php
    end_page();
    ?>
