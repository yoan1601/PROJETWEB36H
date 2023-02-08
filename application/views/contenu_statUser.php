<div class="d-flex flex-wrap mb-5" style="
    margin-left: 3%;
    height: 18%;
    margin-top : 10vh;
">


    <div class="mr-5 mt-3">
        <p class="text-muted">Users</p>
        <h3 class="text-primary fs-30 font-weight-medium" 
        style="color: blue !important;"><?php echo( count($nbUser) ); ?></h3>
    </div>

</div>

<div class="col-lg-6 grid-margin stretch-card" style="margin: auto;">
    <div class="card" style="
    /* width: max-content; */
">
        <div class="card-body" style="
    /* width: max-content; */
">
            <h4 class="card-title">Liste Utilisateurs</h4>

            <div class="table-responsive">
                <table class="table table-hover" style="
    text-align: center;
">
                    <thead>
                        <tr>



                            <th>ID</th>
                            <th>NOM</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($nbUser as $User) { ?>
                        <tr>
                            <td><?php echo($User['id']); ?></td>
                            <td><?php echo($User['nom']); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>