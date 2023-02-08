<div class="d-flex flex-wrap mb-5" style="
    margin-left: 3%;
    height: 18%;
    margin-top : 10vh;
">


    <div class="mr-5 mt-3">
        <p class="text-muted">Echanges</p>
        <h3 class="text-primary fs-30 font-weight-medium" style="
    color: blue !important;
  
"><?php echo( count($nbEchange) ); ?></h3>
    </div>

</div>

<div class="col-lg-6 grid-margin stretch-card" style="margin: auto;">
    <div class="card" style="
    width: max-content;
">
        <div class="card-body" style="
    /* width: max-content; */
">
            <h4 class="card-title">Liste des Echanges</h4>

            <div class="table-responsive">
                <table class="table table-hover" style="
    text-align: center;
">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>DEMANDEUR</th>
                            <th>OBJET</th>
                            <th>ACCEPTEUR</th>
                            <th>OBJET</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($nbEchange as $echange) { ?>
                        <tr>
                            <td><?php echo($echange['id']); ?></td>
                            <td><?php echo($echange['nom1']); ?></td>
                            <td><?php echo($echange['ob1']); ?></td>
                            <td><?php echo($echange['nom2']); ?></td>
                            <td><?php echo($echange['ob2']); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>