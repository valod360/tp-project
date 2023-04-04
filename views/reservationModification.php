<section class="resModifView">
    <?php if (isset($form)) { ?>
        <div class="formStatus <?= $form['status'] ?>">
            <p><?= $form['message'] ?></p>
        </div>
    <?php } else { ?>
        <h1>modifier votre reservation</h1>
</section>
<section  class="resModifForm">
        <form action="/modifier-<?= $_GET['id'] ?>" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir modifier cette réservation ?');">
            <div>
                <label for="dateModificationLoan">date du début a modifier</label>
                <input type="date" name="dateModificationLoan" id="dateModificationLoan" required>
            </div>
            <div>
                <label for="dateModificationLoanReturn">date de fin a modifier</label>
                <input type="date" name="dateModificationLoanReturn" id="dateModificationLoanReturn" required>
            </div>
            <?php if(isset($formErrors['planeSelection'])){ ?>
                <p><?= $formErrors['planeSelection'] ?></p>
            <?php } ?>
            <div>
                <a class="button flat big standard" href="index.php?menuAction=&amp;tsOldStartDate=20230328111500">Revenir à la page précédente</a>
            </div>
            <div>
                <input type="submit" value="Valider la modification" id="ApplyModif" class="ApplyModif">
            </div>
        </form>
    <?php } ?>
</section>