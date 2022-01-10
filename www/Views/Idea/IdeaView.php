<?php
$doc_root = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
include $doc_root.'/HelperUtils.php';
start_page("test");
navbar();
?>
    <div class="container" style="margin-top: 5px">
        <div class="is-vertical-align is-horizontal-align" style="margin-top: 5px; height: 20vh; background-image: url('../Images/0.jpg'); background-position: center; background-size: cover;">
            <h1 class="text-uppercase" style="background-color: rgba(160, 160, 160, 0.64); padding: 5px; color: white">Titre de l'Idée</h1>
        </div>
        <div>
            <div class="row" style="margin-top: 5px">
                <div class="col-8">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pulvinar, eros a rutrum ullamcorper, orci purus semper purus, eu viverra risus turpis sit amet nunc. Sed semper semper congue. Fusce auctor ante sit amet imperdiet tempor. Maecenas tincidunt feugiat ligula ac sodales. Sed egestas, odio sed malesuada aliquet, ligula orci egestas sem, commodo accumsan felis elit eget nunc. Morbi pulvinar justo eget mi varius egestas. Vivamus placerat nulla libero, at vehicula felis volutpat in. In nec nunc pellentesque, tempor mauris a, mattis libero. Aenean ac nulla eu metus rutrum pretium. Donec velit metus, rhoncus quis condimentum id, tincidunt id mi. Maecenas gravida mi id ex consectetur, at eleifend odio dignissim. Aenean consectetur consectetur mattis. Quisque sed tempus augue.
                    Cras iaculis, magna nec tincidunt consequat, leo libero scelerisque magna, eget mattis massa urna et nisi. Sed vulputate massa sapien, id venenatis mauris laoreet sed. Vestibulum rutrum ipsum vel pellentesque fringilla. Vestibulum placerat libero ut massa ullamcorper eleifend. Sed finibus, urna a sollicitudin vestibulum, dui turpis molestie ligula, sit amet rhoncus ligula arcu vel augue. Quisque sit amet porta nunc. Sed efficitur orci nisl, eu interdum nisi molestie ut. Phasellus lobortis volutpat suscipit.
                </div>
                <div class="col-4">
                    <div class="card">
                        <h3>Organisateur</h3>
                        <progress value="60" max="100"></progress>
                        <p>XXX sur XXX pts</p>
                    </div>
                    <div class="card" style="margin-top: 5px">
                        <form action="#">
                            <input type="number"> pts
                            <input type="submit" value="Donner">
                        </form>
                    </div>
                    <div class="card" style="margin-top: 5px">
                        <h4>Contenu Débloquable 1</h4>
                        <code>XXX pts</code>
                        <p>Descr Descr Descr Descr Descr Descr Descr Descr Descr Descr Descr Descr Descr </p>
                    </div>
                    <div class="card" style="margin-top: 5px">
                        <h4>Contenu Débloquable 2</h4>
                        <code>XXX pts</code>
                        <p>Descr Descr Descr Descr Descr Descr Descr Descr Descr Descr Descr Descr Descr </p>
                    </div>
                    <div class="card" style="margin-top: 5px">
                        <h4>Contenu Débloquable 3</h4>
                        <code>XXX pts</code>
                        <p>Descr Descr Descr Descr Descr Descr Descr Descr Descr Descr Descr Descr Descr </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
end_page();
?>