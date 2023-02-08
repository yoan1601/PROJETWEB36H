<?php 
$user = $this->session->utilisateur;
?>     
        
        <!-- Header Area Start -->
        <header class="header-area clearfix" style="
  position: inherit;
  margin-top: 4%;
">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <div class="logo">
                <p>connected en tant que <strong><?php echo($user['nom']); ?></strong>
                </p>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <!-- <ul>
                    <li class="active"><a href="<?php //echo site_url('client/recherche0'); ?>">Recherche</a></li>
                </ul> -->
                <ul>
                    <li class="active"><a href="<?php echo site_url('client/listeOtherObjets/'.$user['id']); ?>">Liste des Objets</a></li>
                </ul>
                <?php foreach($allCategorie as $categorie) { ?>
                <ul>
                    <li class="active"><a href="<?php echo site_url('client/listeOtherObjetsByCategory/'.$user['id'].'/'.$categorie['id']); ?>"><?php echo($categorie['descri']); ?></a></li>
                </ul>
                <?php } ?>
            </nav>
            <div class="cart-fav-search mb-100">
             
                <a href="#" class="search-nav"><img src="<?php echo site_url('img/core-img/search.png'); ?>" alt=""> Search</a>
            </div>

        </header>
        <!-- Header Area End -->