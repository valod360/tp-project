<section id="registerForm">
    <form action="/inscription" method="post">
        <div>
            <label for="firstName">Prénom</label>
            <input type="text" name="firstName" id="firstName" placeholder="Ex: Jhon">
            <?php if(isset($formErrors['firstName'])){ ?>
                <p><?= $formErrors['firstName'] ?></p>
            <?php } ?>
        </div>
        <div>
            <label for="lastName">Nom</label>
            <input type="text" name="lastName" id="LastName" placeholder="Ex: Doe">
        </div>
        <div>
            <label for="city">ville</label>
            <input type="text" name="city" id="city" placeholder="Ex: Compiegne">
        </div>
        <div>
            <label for="email">email</label>
            <input type="email" name="email" id="email" placeholder="Ex: email@mail.fr">
        </div>
        <div>
            <label for="age">age</label>
            <input type="text" name="age" id="age" placeholder="Ex: 23">
        </div>
    
        <div>
            <label for="phoneNumber">numéro de téléphone</label>
            <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Ex: 0600000000">
        </div>
        <div>
            <label for="password">mot de passe</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="buttonsBox">
            <input id="accept" type="submit" value="Inscription">
            <button id="cancel"><a href="/accueil">Annuler</a></button>
        </div>
    </form>
</section>