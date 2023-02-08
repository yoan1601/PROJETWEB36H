            <!-- CONTAINS debut -->

            <div class="col-12 grid-margin" style="
    /* text-align: -webkit-right; */
    /* width: 78%; */
">
                <div class="card" style="width: 70%;background-color: white;/* height: 77%; */">
                    <div class="card-body" style="
    margin-left: 40%;
">
                        <h4 class="card-title" style="
    margin-left: 9%;
">Modifier</h4>
                        <form class="form-sample" method="post" action="<?php echo site_url('admin/modifierCategorie'); ?>">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-9">Description</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="<?php echo $categorie['descri'] ?>" name="descri">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="idCategorie" value="<?php echo $categorie['id'] ?>">


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