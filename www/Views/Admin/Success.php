<?php
start_page("test");
navbar();
/** @var array $data */
?>
    <h1>Opération réussie</h1>
<?php
returnButton($data['path']);
end_page();