
<div class="col-lg-6 grid-margin stretch-card" style="margin: auto;">
    <div class="card" style="
    width: max-content;
">
        <div class="card-body" style="
    /* width: max-content; */
">
            <h4 class="card-title">Liste des historiques des Echanges</h4>

            <div class="table-responsive">
                <table class="table table-hover" style="
    text-align: center;
">
                    <thead>
                        <tr>
                            <th>DATE ET HEURE</th>
                            <th>NOM</th>
                            <th>OBJET</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($echange as $echangee) { ?>
                        <tr>
                            <td><?php echo($echangee['dateheure']); ?></td>
                            <td><?php echo($echangee['nom']); ?></td>
                            <td><?php echo($echangee['descri']); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>