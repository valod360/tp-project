<section>
    <?php if (isset($form)) { ?>
        <div class="formStatus <?= $form['status'] ?>">
            <p><?= $form['message'] ?></p>
        </div>
    <?php } else { ?>
        <h1>profil</h1>
        <h2 id="userProfil">information personnelle</h2>

        <?php foreach ($userList as $u) { ?>
            <div class="userProfilContainer">
                <form name="profilFormular" action="/profil" method="post" id="profilFormular">
                    <label for="firstNameModif">prénom</label>
                    <input type="text" name="firstNameModif" id="firstNameModif" value="<?= $u->firstName ?>" class="personnalInfo" disabled>
                    <?php if (isset($formErrors['firstNameModif'])) { ?>
                        <p class="formError"><?= $formErrors['firstNameModif'] ?></p>
                    <?php } ?>

                    <label for="lastNameModif">Nom</label>
                    <input type="text" name="lastNameModif" id="lastNameModif" value="<?= $u->lastName ?>" class="personnalInfo" disabled>
                    <?php if (isset($formErrors['lastNameModif'])) { ?>
                        <p class="formError"><?= $formErrors['lastNameModif'] ?></p>
                    <?php } ?>

                    <label for="ageModif">age</label>
                    <input type="text" name="ageModif" id="ageModif" value="<?= $u->major ?>" class="personnalInfo" disabled>
                    <?php if (isset($formErrors['ageModif'])) { ?>
                        <p class="formError"><?= $formErrors['ageModif'] ?></p>
                    <?php } ?>

                    <label for="cityModif">ville</label>
                    <input type="text" name="cityModif" id="cityModif" value="<?= $u->city ?>" class="personnalInfo" disabled>
                    <?php if (isset($formErrors['cityModif'])) { ?>
                        <p class="formError"><?= $formErrors['cityModif'] ?></p>
                    <?php } ?>

                    <label for="emailModif">email</label>
                    <input type="email" name="emailModif" id="emailModif" value="<?= $u->email ?>" class="personnalInfo" disabled>
                    <?php if (isset($formErrors['emailModif'])) { ?>
                        <p class="formError"><?= $formErrors['emailModif'] ?></p>
                    <?php } ?>

                    <label for="phoneNumberModif">numéro de téléphone</label>
                    <input type="text" name="phoneNumberModif" id="phoneNumberModif" value="<?= $u->phoneNumber ?>" class="personnalInfo" disabled>
                    <?php if (isset($formErrors['phoneNumberModif'])) { ?>
                        <p class="formError"><?= $formErrors['phoneNumberModif'] ?></p>
                    <?php } ?>

                    <input id="confirmModification" name="confirmModification" type="submit" value="confirmer la modification">
                </form>
            <?php } ?>

            <button id="ModifieProfilButton">modifier le profil</button>



            <button class="open-modal-btn">Supprimer le compte</button>

            <div id="modal" class="modal">
                <div class="modal-content">
                    <span class="close-btn">&times;</span>
                    <h2>Etes vous sur de bien vouloir supprimer votre compte ?</h2>
                    <p>Cliquer sur le bouton "Confirmer" ci-dessous pour supprimer le compte :</p>
                    <form name="suppresion" action="/profil" method="post">
                        <input id="confirmSupression" name="confirmSupression" type="submit" value="supprimer le compte">
                    </form>
                </div>
            </div>
            <!--<form name="suppresion" action="/profil" method="post" >
                <input id="confirmSupression" name="confirmSupression" type="submit" value="supprimer le compte">
            </form>-->
            </div>



</section>
<?php } ?>

<script src="../assets/js/user.js"></script>