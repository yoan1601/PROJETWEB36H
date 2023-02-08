
            <!-- CONTAINS debut -->
            <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                

                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                
                                <div class="carousel-inner">
                                    <div class="ca">
                                            <img class="d-block w-100" src="<?php echo site_url('img/objets/'.$objet['image']); ?>">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price"><?php echo $objet['prix'] ?> Ar</p>
                                <a href="product-details.html">
                                    
                                </a>
                                <!-- Ratings & Review -->
                                
                                
                                
                            </div>

                            <div class="short_overview my-5">
                                <p><?php echo $objet['descri'] ?></p>
                            </div>

                            <!-- Add to Cart Form -->
                            <!-- <form class="cart clearfix" action="<?php //echo site_url('client/interet'); ?>" method="post">
                                <input type="hidden" name="idObjetDemandeur" value="<?php //echo $objet['id'] ?>">
                                <button type="submit" class="btn btn-warning">Proposer un echange</button>
                            </form> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
            
            <!-- CONTAINS Fin -->