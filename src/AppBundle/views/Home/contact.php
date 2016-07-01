<?php include __DIR__ . '/../top.php'; ?>

<div class="container">

    <?php //if( !isset($msgError) )  $msgError="";
          if( !empty($msg_upload) )
    ?> <div class="text-center bg-success "><p><?php echo $msg_upload; ?></p></div>


    <div class="text-center bg-danger "><p><?php echo $msgError; ?></p></div>

    <h3>Ajouter un contact en remplissant le formulaire ci-dessous.</h3>
    <div class="col-md-12 well">
        <form method="post" action="<?php echo $path('Contact') ?>" class="form-horizontal" enctype="multipart/form-data">

            <div class="form-group">
                <label for="inputNom" class="col-sm-2 control-label" >Nom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputNom" placeholder="Nom" name="input[nom]" required value="<?php echo $nom; ?>" >
                </div>
            </div>

            <div class="form-group">
                <label for="inputPrenom" class="col-sm-2 control-label">Prenom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPrenom" placeholder="Prenom" name="input[prenom]"  required value="<?php echo $prenom; ?>" >
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="input[email]" required value="<?php echo $email; ?>" >
                </div>
            </div>

            <div class="form-group">
                <label for="textareaDescription" class="col-sm-2 control-label">Description de la demande</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" placeholder="Description de la demande" id="textareaDescription" required name="input[description]"  ><?php echo $description; ?></textarea>
                </div>
            </div>


            <div class="form-group">
                <label for="inputPhoto" class="col-sm-2 control-label">Photo</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="inputPhoto" placeholder="Photo" name="input[photo]" required value="<?php echo $photo; ?>" >
                </div>
            </div>

            <div class="form-group">

                <div class="col-sm-10">
                    <input type="submit" class="form-control btn btn-primary" id="input['bouton']" placeholder="Photo" value="Envoyer" >
                </div>
            </div>

        </form>
    </div>
</div>

<?php include __DIR__ . '/../bottom.php'; ?>
