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
                     <div id="fonction">
                         <div id="modif">
                             <a href="<?php echo site_url('client/update0/'.$obj['id']); ?>">
                                 modifier
                             </a>
                         </div>
                         <div id="supprimer">
                             <a href="#">
                                 supprimer
                             </a>
                         </div>
                     </div>
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
             </div>
             <?php } ?>


         </div>
     </section>
     <!-- CONTAINS Fin -->


 </div>





 <!-- Product Catagories Area End -->