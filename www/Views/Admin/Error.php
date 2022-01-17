<?php

start_page("test");
navbar();
returnButton('.');
if (isset($data['errors'])) {
    displayErrors($data['errors']);
}
?>
    <h1>Opération réussie</h1>
    <a href=".">Retour</a>
<?php
end_page();