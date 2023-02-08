<?php
    $user = $this->session->utilisateur;
?>            
            <!-- CONTAINS debut -->
            <div class="col-12 grid-margin" style="
    /* text-align: -webkit-right; */
    /* width: 78%; */
">
                <div class="card"
                    style="width: 40%;background-color: white;/* height: 77%; */margin: auto;margin-top: -16%;">
                    <div class="card-body" style="
    margin-left: 32%;
">
                        <h4 class="card-title" style="
    margin-left: 9%;
">Ajouter un objet</h4>
                        <form class="form-sample" method="post" action="<?php echo site_url('client/ajoutObjet'); ?>">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-9">Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="descri">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="row">
                                        <label class="col-sm-9">Photo</label>
                                            <div class="col-sm-9">
                                                <select name="idImage" id="idimg">
                                                    <?php foreach($allImage as $image) { ?>
                                                    <option value="<?php echo $image['id'] ?>"><?php echo $image['descri'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <!-- <input type="text" name="img" > -->
                                            </div>
                                        </div>
                                        <div class="row">
                                        <label class="col-sm-9">Categorie</label>
                                            <div class="col-sm-9">
                                                <select name="idCategorie" id="idCategorie">
                                                    <?php foreach($allCategorie as $c) { ?>
                                                    <option value="<?php echo $c['id'] ?>"><?php echo $c['descri'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <!-- <input type="text" name="img" > -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row" style="
    width: 174%;
">
                                                    <label class="col-sm-9" style="
    margin-left: 4%;
    margin-top: 9%;
">Prix</label>
                                                    <div class="col-sm-9">
                                                        <input type="number" name="prix" min="0">
                                                        <input type="hidden" name="idUser" value="<?php echo $user['id'] ?>">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <button type="submit" class="btn btn-warning" style="
    margin-top: 33%;
    margin-left: 45%;
"><a>Ajouter</a></button>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>




                        </form>
                    </div>
                </div>
            </div>
            <!-- CONTAINS Fin -->