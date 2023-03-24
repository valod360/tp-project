<?php session_start(); ?>
<?php require_once 'views/parts/header.php'; ?>


<div id="carrousel">
  <article>
    <img src="assets/images/aerodrome.jpg">
  </article>
  <article>
    <img src="assets/images/aerodrome2.jpg">
  </article>
  <article>
    <img src="assets/images/aerodrome3.jpg">
  </article>
</div>


<h1>Notre flotte</h1>
<div class="container">
  <div class="text-image-container">
    <div class="text">
      <h2>Jet privé moyen-courrier</h2>
      <p>
        Pour faire en sorte que vos voyages soient optimaux, nous ferons notre maximum pour que votre voyage se passe sans encombre. <br />
        Vous pouvez faire confiance à nos avions haut de gamme pour voyager en sécurité. <br />
        Nous espérons avoir le plaisir de vous compter parmi nos futurs clients.
      </p>
    </div>
    <div class="images">
      <img src="assets/images/jet-privée-moyen-courrier.jpg" alt="jet moyen courrier">
    </div>
  </div>

  <div class="text-image-container">
    <div class="text">
      <h2>Jet privé court-courrier</h2>
      <p>
        Ce type de jet est fait pour que vous puissiez faire de votre voyage un agréable moment. <br />
        Évidemment, vous pourrez parcourir de longues distances tout en faisant des arrêts dans différents aéroports. <br />
        Nous vous attendons donc avec impatience dans notre aérodrome pour discuter avec notre personnel.
      </p>
    </div>
    <div class="images">
      <img src="assets/images/jet-privé-court-courrier.jpg" alt="jet court courrier">
    </div>
  </div>

  <div class="text-image-container">
    <div class="text">
      <h2>Avion de plaisance</h2>
      <p>
        Nous vous proposons aussi des avions civils de petite taille, type DR-400, pour des petits voyages agréables en famille. <br />
        Nous espérons vous voir bientôt dans notre aérodrome pour que vous puissiez voler en toute sécurité.
      </p>
    </div>
    <div class="images">
      <img src="assets/images/dr-400.jpg" alt="image avion civil">
    </div>
  </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script src="assets/js/main.js"></script>


<?php require_once 'views/parts/footer.php' ?>