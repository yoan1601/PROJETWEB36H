<!-- Product Catagories Area Start -->
<div class="products-catagories-area clearfix" style="
  margin-top: 10%;
  background-color: white;
">
    <style>
        #iray {
            width: 20vw;
            height: max-content;
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
            margin-top: 2%;
        }
    </style>

    <!-- CONTAINS debut -->

    <section>
        <div id="all">
            <?php foreach ($OtherObjets as $obj) { 
                //var_dump($obj);
                ?>
                <div id="iray">
                    <div id="sary">
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