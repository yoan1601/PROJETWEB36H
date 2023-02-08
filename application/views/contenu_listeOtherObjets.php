 <!-- Product Catagories Area Start -->
 <div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">


     <!-- CONTAINS debut -->

     <section>
         <button type="button" class="btn btn-warning"><a>Ajouter un objet</a></button>
         <div id="all">
            <?php foreach($OtherObjets as $obj) { ?>
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
                 <div id="fonction">
                    <div id="fiche">
                        <a href="<?php  echo site_url('client/fiche/'.$obj['id']); ?>">
                            Fiche
                        </a>
                    </div>
                </div>
             </div>
             <?php } ?>


         </div>
     </section>
     <!-- CONTAINS Fin -->


 </div>





 <!-- Product Catagories Area End -->