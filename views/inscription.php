<section id="registerForm">


    <?php if(isset($form)){ ?>
        <div class="formStatus <?= $form['status'] ?>">
            <?= $form['message']; ?>
        </div>
    <?php }else{ ?>


    <form action="/inscription" method="post">
        <div>
            <label for="firstName">Prénom</label>
            <input type="text" name="firstName" id="firstName" placeholder="Ex: Jhon">
            <?php if(isset($formErrors['firstName'])){ ?>
                <p class="formError"><?= $formErrors['firstName'] ?></p>
            <?php } ?>
        </div>
        <div>
            <label for="lastName">Nom</label>
            <input type="text" name="lastName" id="LastName" placeholder="Ex: Doe">
            <?php if(isset($formErrors['lastName'])){ ?>
                <p class="formError"><?= $formErrors['lastName'] ?></p>
            <?php } ?>
        </div>
        <div>
            <label for="city">ville</label>
            <input type="text" name="city" id="city" placeholder="Ex: Compiegne">
            <?php if(isset($formErrors['city'])){ ?>
                <p class="formError"><?= $formErrors['city'] ?></p>
            <?php } ?>
        </div>
        <div>
            <label for="email">email</label>
            <input type="email" name="email" id="email" placeholder="Ex: email@mail.fr">
            <?php if(isset($formErrors['email'])){ ?>
                <p class="formError"><?= $formErrors['email'] ?></p>
            <?php } ?>
        </div>
        <div>
            <label for="age">age</label>
            <input type="text" name="age" id="age" placeholder="Ex: 23">
            <?php if(isset($formErrors['age'])){ ?>
                <p class="formError"><?= $formErrors['age'] ?></p>
            <?php } ?>
        </div>
    
        <div>
            <label for="phoneNumber">numéro de téléphone</label>
            <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Ex: 0600000000">
            <?php if(isset($formErrors['phoneNumber'])){ ?>
                <p class="formError"><?= $formErrors['phoneNumber'] ?></p>
            <?php } ?>
        </div>
        <div>
            <label for="password">mot de passe</label>
            <input type="password" name="password" id="password">
            <?php if(isset($formErrors['password'])){ ?>
                <p class="formError"><?= $formErrors['password'] ?></p>
            <?php } ?>
        </div>
        <div>
            <label for="confirmPass">confirmer le mot de passe</label>
            <input type="password" name="confirmPass" id="confirmPass">
            <?php if(isset($formErrors['confirmPass'])){ ?>
                <p class="formError"><?= $formErrors['confirmPass'] ?></p>
            <?php } ?>
        </div>
        <div class="buttonsBox">
            <input id="accept" type="submit" value="Inscription">
            <button id="cancel"><a href="/accueil">Annuler</a></button>
        </div>
    </form>
</section>
<?php } ?>