 <!-- Product Catagories Area Start -->
 <div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">


     <!-- CONTAINS debut -->

     <section>
         <div id="all">
            <?php foreach($allCategorie as $categorie) { ?>
             <div id="iray">
                     <div id="fonction">
                         <div id="modif">
                             <a href="<?php echo site_url('admin/update0/'.$categorie['id']) ?>">
                                 modifier
                             </a>
                         </div>
                         <div id="supprimer">
                             <a href="<?php echo site_url('admin/supprimerCategorie') ?>">
                                 supprimer
                             </a>
                         </div>
                 </div>
                 <div id="lettre">
                     <p>
                        <?php echo($categorie['descri']); ?>
                     </p>
                 </div>
             </div>
             <?php } ?>


         </div>
     </section>
     <!-- CONTAINS Fin -->


 </div>





 <!-- Product Catagories Area End -->