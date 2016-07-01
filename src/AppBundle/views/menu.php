<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $path('index'); ?>">Mon commerce</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse" >
            <ul class="nav navbar-nav">
                <li><a href="<?php echo $path('wiki') ?>">Wiki</a></li>
                <li><a href="<?php echo $path('articles') ?>">Articles</a></li>
                <li><a href="<?php echo $path('listContact') ?>">Liste des contacts</a></li>
                <li><a href="<?php echo $path('listProduits') ?>">Liste de produits</a></li>
                <li><a href="<?php echo $path('produitsTypes') ?>">Categories de produits</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if( empty($_SESSION['user']) )
                {
                    ?>
                    <a data-toggle="modal" data-backdrop="false" href="#login" class="btn btn-success" style="margin-top: 6%;" >Login</a>
                <?php } ?>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        Utilisateur <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Informations</li>
                        <li><a href="<?php echo $path('profilUser'); ?>" >Profil</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Autre</li>
                        <?php if( !empty($_SESSION['user']) ) {?>
                        <li><a href="<?php echo $path('userLogout'); ?>">Deconnexion</a></li>
                        <?php } ?>
                    </ul>

                </li>
                <?php if( empty($_SESSION['user']) ) {?>
                    <a data-toggle="modal" data-backdrop="false" href="#formulaire" class="btn btn-primary" style="margin-top: 6%;" >Inscription</a>
                <?php }
                else{
                    ?>
                    <a href="#" >Bienvenue : <?php echo $_SESSION['user']['username']; ?></a>
                <?php
                }
                ?>

               <!--
               <li><a data-toggle="modal" data-backdrop="false" href="#formulaire" class="btn btn-primary">Inscription</a></li>
               <button data-toggle="modal" data-backdrop="false" href="#formulaire" class="btn btn-primary">Inscription</button>
               <button data-toggle="modal" href="modal1.html" data-target="#infos" class="btn btn-primary" >Inscription</button>
               <li><a href="#infos" class="btn btn-primary" data-toggle="modal" >Inscription</a></li>
               <li><a href="<?php //echo $path('inscription') ?>"Inscription</a></li> -->
            </ul>

        </div><!--/.nav-collapse -->



    </div>
</nav>

<!-- ------------------------------------------------------  Formulaire d'inscription --------------------------------------------   -->

<div class="modal fade" id="formulaire" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">Formulaire d'inscription :</h4>
            </div>

            <div class="modal-body">
                <p id="warningInscription" style="display:none; color: red;" ></p>
                <form action="<?php echo $path('incription'); ?>" method="post" id="formInscriptionId" >

                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name ="inscription[nom]" id="nom" placeholder="Votre nom">
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" name ="inscription[prenom]" id="prenom" placeholder="Votre prenom">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name ="inscription[username]" id="username" placeholder="Votre username">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="inscription[email]" id="emailInscription" placeholder="Votre Email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name ="inscription[password]" id="password" placeholder="Votre mot de passe">
                    </div>


                    <button type="button" class="btn btn-primary" data-url="<?php echo $path('validInscription'); ?>" data-id="sggsfg" id="submitFormInscription" >Envoyer</button>

                    <div class="modal-footer" style="margin-top: -8.9%;">
                        <button class="btn btn-info" data-dismiss="modal">Annuler</button>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>

<!-- ------------------------------------------------------  Formulaire de login --------------------------------------------   -->
<div class="modal fade" id="login" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">Formulaire d'authentification :</h4>
            </div>

            <div class="modal-body">

                <form action="<?php echo $path('login'); ?>" method="post" >

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="login[email]" id="email" placeholder="Votre Email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="login[password]" id="password" placeholder="Votre password">
                    </div>

                    <button type="submit" class="btn btn-primary">Envoyer</button>
                    <div class="modal-footer" style="margin-top: -8.9%;">
                        <button class="btn btn-info" data-dismiss="modal">Annuler</button>
                    </div>
                </form>

            </div>


        </div>
    </div>
</div>