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
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="<?php echo site_url('client/listeOtherObjets/'.$user['id']); ?>">Liste des Objets</a></li>
                </ul>
            </nav>
            <!-- Button Group -->

            <!-- Cart Menu -->

            <!-- Social Button -->

        </header>
        <!-- Header Area End -->