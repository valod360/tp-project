<section>
    <form action="/connexion" method="post" id="connexionForm">
        <div>
            <label for="email">email</label>
            <input type="text" name="email" id="email">
            <?php if(isset($formErrors['email'])){ ?>
                <p><?= $formErrors['email'] ?></p>
            <?php } ?>
        </div>
        <div>
            <label for="password">mot de passe</label>
            <input type="password" name="password" id="password">
            <?php if(isset($formErrors['password'])){ ?>
                <p><?= $formErrors['password'] ?></p>
            <?php } ?>
        </div>
        <div class="buttonBox">
            <input id="accept" type="submit" value="connexion">
            <button id="cancel"><a href="/inscription">inscivez-vous</a></button>
            
        </div>
    </form>
</section>