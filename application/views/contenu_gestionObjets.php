<?php 
$user = $this->session->utilisateur;
?>     
<!-- Product Catagories Area Start -->
<div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">
    <style>
        #iray {
            width: 20vw;
            height: 67vh;
            margin: 20px 20px;
            border: 1px solid gray;
            border-radius: 10px;
            box-shadow: 5px 5px 10px grey;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }

        #iray #lettre {
            text-align: center;
            margin-top: -20% !important;
        }
    </style>

    <!-- CONTAINS debut -->

    <section>
        <button type="button" class="btn btn-warning"><a>Ajouter un objet</a></button>
        <div id="all">

            <?php foreach ($allMyObjets as $obj) { ?>
                <div id="iray">

                    <div id="pourcent" style="margin-left: 3%;">
                        <a href="<?php echo site_url('client/getListByInterval/'.$user['id'].'/'.$obj['prix'].'/'. 10); ?>" style="color: blue;font-size: 119%;margin-right: 10%;">+-10%</a>
                        <a href="<?php echo site_url('client/getListByInterval/'.$user['id'].'/'.$obj['prix'].'/'. 20 ); ?>" style="color: blue;font-size: 119%;">+-20%</a>
            </div>
                        <div id="sary">
                            <div id="fonction">
                                <div id="modif">
                                    <a href="<?php echo site_url('client/update0/' . $obj['id']); ?>">
                                        modifier
                                    </a>
                                </div>
                                <div id="supprimer">
                                    <a href="#">
                                        supprimer
                                    </a>
                                </div>
                            </div>
                            <img src="<?php echo (site_url('img/objets/' . $obj['image'])); ?>" alt="">
                        </div>
                        <div id="lettre">
                            <p>
                                <?php echo ($obj['descri']); ?>
                            </p>
                            <p>
                                <?php echo ($obj['prix']); ?> AR
                            </p>
                        </div>
                    </div>
                <?php } ?>


            </div>
    </section>
    <!-- CONTAINS Fin -->


</div>





<!-- Product Catagories Area End -->