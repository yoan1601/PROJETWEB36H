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
">Recherche</h4>
                        <form class="form-sample" method="post" action="<?php echo site_url('client/updateObjet'); ?>">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-9">Mot cle</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?php echo $objet['descri'] ?>" name="descri">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-9">Photo</label>
                                        <div class="col-sm-9">
                                            <div class="select" tabindex="0" style="
    margin-left: -1%;
"><span class="current">Test</span>
                                                <!-- <ul class="list">
                                                    <li data-value="test" class="option selected focus">Test</li>
                                                    <li data-value="test2" class="option">Test2</li>
                                                </ul> -->
                                                <input type="text" name="img" value="<?php echo $objet['image'] ?>">
                                                <input type="hidden" name="idObj" value="<?php echo $objet['id'] ?>">
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
                                                        <input type="number" name="prix" min="0"
                                                            value="<?php echo $objet['prix'] ?>">
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <button type="submit" class="btn btn-warning" style="
    margin-top: 33%;
    margin-left: 45%;
"><a>Modifier</a></button>
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