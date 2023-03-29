<!-- pour la reservation j'ai besoin de la date de la durée et de l'appareil a reservé -->

<section>
    <form action="/réservation" method="post">
        <label for="resource_id">Resource</label>
        <select id="resource_id" name="resource_id">
            <option value="-1" disabled="">-- Choisir une valeur --</option>
            <option value="F-GGQL">DR-400</option>
            <option value="cessna-citation">cessna-citation</option>
            <option value="F-GLKI">F-GLKI (DR44)</option>
        </select>
        <label for="acitivityType">Réservation</label>
        <input type="checkbox" id="acitivityType" name="acitivityType" class="checkbox" value="1">


        <div class="">
            <label for="startLoan">Début de la reservation</label>
            <input type="date" name="startLoan" id="startLoan">
            <label for="endLoan">Fin de la reservation</label>
            <input type="date" name="endLoan" id="endLoan">
        </div>
        <a class="button flat big standard" href="index.php?menuAction=&amp;tsOldStartDate=20230328111500">Revenir à la page précédente</a>
        <input type="submit" value="Enregistrer" name="validation" id="validation" class="button flat big blue">
    </form>
</section>