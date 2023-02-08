<!-- CONTAINS debut -->
<div class="col-lg-6 grid-margin stretch-card" style="
">
    <div class="card" style="width: max-content;margin-top: 22%;margin-left: 13%;">

        <div class="card-body" style="
    width: max-content;
">
            <h4 class="card-title">Proposition</h4>

            <div class="table-responsive">
                <table class="table table-hover" style="text-align: center;">
                    <thead>
                        <tr>
                            <th>Autre User</th>
                            <th>Objet Autre User</th>
                            <th>Mon objet</th>
                            <th>Accepter</th>
                            <th>Refuser</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($allPropositions as $proposition) { ?>
                        <tr>
                            <td><?php echo($proposition['utilisateur']['nom']); ?></td>
                            <!-- TSY diso ito logique ito -->
                            <td><?php echo($proposition['monobjet']['descri']); ?></td>
                            <td><?php echo($proposition['objetDemandeur']['descri']); ?></td>
                            <td><a href="<?php echo site_url('client/accepte/'.$proposition['id']); ?>"><label
                                        class="badge badge-warning">Accepter</label></a></td>
                            <td><a href="<?php echo site_url('client/refus/'.$proposition['id']); ?>"><label
                                        class="badge badge-danger">Refuser</label></a></td>
                        </tr>
                        <?php } ?>




                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- CONTAINS Fin -->