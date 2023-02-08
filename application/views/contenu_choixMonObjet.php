 <!-- Product Catagories Area Start -->
 <div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">


     <!-- CONTAINS debut -->

     <section>
         <button type="button" class="btn btn-warning"><a>Ajouter un objet</a></button>
         <div id="all">
            <?php foreach($allMyObjets as $obj) { ?>
             <div id="iray">
                 <div id="sary">
                     <img src="<?php echo(site_url('img/objets/'.$obj['image'])); ?>" alt="">
                 </div>
                 <div id="lettre">
                     <p>
                        <?php echo($obj['descri']); ?>
                     </p>
                     <p>
                        <?php echo($obj['prix']); ?> AR
                     </p>
                 </div>
                 <form class="cart clearfix" action="<?php echo site_url('client/insertProposition'); ?>" method="post">
                    <input type="hidden" name="idMonObjet" value="<?php echo $obj['id'] ?>">
                    <input type="hidden" name="idObjetDemandeur" value="<?php echo $objetDemandeur['id'] ?>">
                    <button type="submit" class="btn btn-warning">Proposer un echange</button>
                </form>
             </div>
             <?php } ?>


         </div>
     </section>
     <!-- CONTAINS Fin -->


 </div>





 <!-- Product Catagories Area End -->