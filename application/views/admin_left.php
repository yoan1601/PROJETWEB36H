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
                <ul>
                    <li class="active"><a href="<?php echo site_url('admin/listUtilisateur'); ?>">Statistique des Utilisateurs</a></li>
                </ul>
                <ul>
                    <li class="active"><a href="<?php echo site_url('admin/listEchange'); ?>">Statistique des Echanges</a></li>
                </ul>
                <ul>
                    <li class="active"><a href="<?php echo site_url('#'); ?>">Historique des Echanges</a></li>
                </ul>
                <ul>
                <ul>
                    <li class="active"><a href="<?php echo site_url('admin/listeAllObjets'); ?>">Liste des Objets</a></li>
                </ul>
                    <?php foreach($allCategorie as $categorie) { ?>
                <ul>
                    <li class="active"><a href="<?php echo site_url('admin/listeAllObjetByCategory/'.$categorie['id']); ?>"><?php echo($categorie['descri']); ?></a></li>
                </ul>
                <?php } ?>

                </ul>
            </nav>
            <!-- Button Group -->

            <!-- Cart Menu -->

            <!-- Social Button -->

        </header>
        <!-- Header Area End -->