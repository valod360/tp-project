<!-- pour la reservation j'ai besoin de la date de la durée et de l'appareil a reservé -->

<?php if(isset($form)){ ?>
    <div class="formStatus <?= $form['status'] ?>">
        <p><?= $form['message'] ?></p>
    </div>
<?php }else{ ?>
<section class="planeReservationTitle">
    <h2>Réservé votre avion !</h2>
</section>

<section class="planeReservationContainer">
    <form action="/réservation" method="post">


        <!-- pour le choix de l'avion -->
        <label for="resource_id">Resource</label>
        <select id="resource_id" name="resource_id">
            <option value="-1" disabled="">-- Choisir une valeur --</option>

            <?php
            if (count($planeList) > 0) {
                foreach ($planeList as $p) { ?>
                    <option value="<?= $p->id . ' - ' . $p->name ?>"> <?= $p->name ?> </option>
                <?php
                }
            } else { ?>
                <option value="aucun résulat">aucun résulat</option>
            <?php } ?>
        </select>
        <?php if (isset($formErrors['planeSelection'])) { ?>
            <p class="formError"><?= $formErrors['planeSelection'] ?></p>
        <?php } ?>



        <div>
            <!-- pour les checkbox reservation et achat a faire plus tard pour le check modification de la bdd a faire-->
            <label for="planeRes_reservation">Réservation</label>
            <input type="radio" id="planeRes_reservation" name="planeRes" value="reservation">

            <label for="planeRes_achat">Achat</label>
            <input type="radio" id="planeRes_achat" name="planeRes" value="achat">

            <?php if (isset($formErrors['radio'])) { ?>
                <p class="formError"><?= $formErrors['radio'] ?></p>
            <?php } ?>
        </div>





        <!-- pour les date de reservation -->
        <div class="">
            <label for="startLoan">Début de la reservation</label>
            <input type="date" name="startLoan" id="startLoan">

            <?php if (isset($formErrors['loan'])) { ?>
                <p class="formError"><?= $formErrors['loan'] ?></p>
            <?php } ?>




            <label for="endLoan">Fin de la reservation</label>
            <input type="date" name="endLoan" id="endLoan">

            <?php if (isset($formErrors['loanReturn'])) { ?>
                <p class="formError"><?= $formErrors['loanReturn'] ?></p>
            <?php } ?>



        </div>
        <a class="button flat big standard" href="index.php?menuAction=&amp;tsOldStartDate=20230328111500">Revenir à la page précédente</a>
        <div>
            <input type="submit" value="Enregistrer" name="validation" id="validation" class="button flat big blue">
        </div>


    </form>
</section>
<?php } ?>