<section class="sectionSeeReservation">
    <?php if (isset($form)) { ?>
        <div class="formStatus <?= $form['status'] ?>">
            <p><?= $form['message'] ?></p>
        </div>
    <?php } else { ?>
        <h1>Vos réservation</h1>
        <?php if (count($result) > 0) {
            foreach ($result as $i) { ?>
                <div class="cardContainer">
                    <p><?= $i->name ?></p>
                    <img src="<?= $i->images ?>" class="reservationImage">
                    <p>l'emprun dura du <?= date('d/m/Y', strtotime($i->loan)) ?> au
                        <?= date('d/m/Y', strtotime($i->loanReturn)) ?>, bon vol!</p>
                    <form action="/réservation-perso" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?');">
                        <input type="hidden" name="id" value="<?= $i->id ?>">
                        <input type="submit" name="annulerRes" value="annuler la reservation" id="annulerRes" class="annulerRes">
                    </form>
                    <form action="/modifier-<?= $i->id ?>" method="get">
                        <input type="hidden" name="id" value="<?= $i->id ?>">
                        <input type="submit" name="modifierRes" value="Modifier la reservation" id="modifierRes" class="modifierRes">
                    </form>
                </div>
            <?php } ?>
            <p>merci d'avoir réserver vos avion chez nous vous pouvez venir les chercher au LFBG il suffit de nous contacter</p>
        <?php  } else { ?>
            <p>aucune réservation n'a été faite</p>

    <?php }
    }
    ?>

</section>