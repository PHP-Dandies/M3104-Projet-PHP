<?php
start_page("test");
navbar();
returnButton('.');
if (isset($data['errors'])) {
    displayErrors($data['errors']);
}
?>
    <div class="container" style="margin-top: 5px">
        <h1 class="text-center"> Créer une nouvelle campagne </h1>
            <div class=card>
                <form action="?controller=Admin&action=createCampaign" method="post">
                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Entrer le titre de la campagne <span class="text-red-500">*</span></label>
                        <input type="text" name="Title" class="border-2 border-gray-300 p-2 w-full" id=title" maxlength="25" placeholder="Entrez le nom de votre nouvelle campagne" value="" required>
                    </div>
                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Sélectionner le début de la campagne :</label>
                            <input type="date" name="BegDate" min="<?php echo date('Y-m-d') ?>" required>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label>Sélectionner la fin de la campagne :
                            <input type="date" name="EndDate" min="<?php echo date('Y-m-d') ?>" required>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label>Sélectionner la fin des délibérations :
                            <input type="date" name="DelibEndDate" min="<?php echo date('Y-m-d') ?>" required>
                        </label>
                    </div>
                    <div class="mb-4">
                        <label>Sélectionner le nombre de points à attribuer aux donateurs :
                            <input type="number" name="pts" min="1" required>
                        </label>
                    </div>
                    <button role="submit" class="bg-transparent hover:bg-blue text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded" required>Enregistrer</button>
                </form>
            </div>
    </div>