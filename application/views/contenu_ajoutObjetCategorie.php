 <!-- Product Catagories Area Start -->
 <div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">


     <!-- CONTAINS debut -->

     <section>
         <form action="ajoutObjetDansCategorie" method="get">
             <div id="all">
             <?php foreach($allObjetSansCategorie as $objet) { ?>
                <div id="iray">
                     <div id="sary">
                         <!-- <div id="kely">...</div> -->

                         <img src="<?php echo(site_url('img/objets/'.$objet['image'])); ?>" alt="">
                     </div>
                     <div id="lettre">

                         <p>
                             Desc;
                         </p>

                     </div>
                     <div tabindex="0" style="margin-left: 14%;">
                            <select name="idCategorie" id="idCategorie">
                            <?php foreach($allCategorie as $categorie) { ?>
                                <option value="<?php echo($categorie['id']); ?>"><?php echo($categorie['descri']); ?></option>
                            <?php } ?>
                            </select>
                            <input type="hidden" name="idObjet" value="<?php echo($objet['id']); ?>">
                             <button type="submit" class="btn btn-warning">Ajouter</button>
                     </div>
            <?php } ?>
                 </div>
             </div>
         </form>

     </section>
     <!-- CONTAINS Fin -->


 </div>





 <!-- Product Catagories Area End -->