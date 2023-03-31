<section class="sectionSeeReservation">
    <h1>Vos réservation</h1>
    <?php foreach ($result as $i) {?>
        <div class="cardContainer">
            <p><?= $i->name ?></p>
            <img src="<?= $i->images ?>">
            <p>l'emprun dura du <?= date('j/m/Y', strtotime($i->loan)) ?> au <?= date('j/m/Y', strtotime($i->loanReturn)) ?>, bon vol!</p>
            <input type="submit" name="annuler" value="annuler la reservation" id="annuler">
        </div>
    <?php } ?> 
    <p>merci d'avoir réserver vos avion chez nous vous pouvez venir les chercher au LFBG il suffit de nous contacter</p>
</section>