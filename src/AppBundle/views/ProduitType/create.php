<?php include __DIR__ . '/../top.php'; ?>

<?php

if( !empty($msgSuccess) )
?> <div class="text-center bg-success "><p><?php echo $msgSuccess; ?></p></div>

<?php //if( !isset($msgError) )  $msgError="";
if( !empty($msgError) )
?>
<div class="text-center bg-danger "><p><?php echo $msgError; ?></p></div>

<div class="container">

    <div class="col-md-12 well">
        <form method="post" action="<?php echo $path("produitTypeCreate") ?>" class="form-horizontal" >

            <input type="hidden" name="categorie[id]" value="<?php echo $id; ?>" />

            <div class="form-group">
                <label for="categorieNom" class="col-sm-2 control-label" >Nom de categorie : </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="categorieNom" placeholder="Nom categorie" name="categorie[nom]" required value="<?php echo $nomCategorie; ?>" >
                </div>
            </div>

            <div class="form-group">

                <div class="col-sm-10">
                    <input type="submit" class="form-control btn btn-primary" id="categorie['bouton']" placeholder="Créer" value="Créer la categorie" >
                </div>
            </div>

        </form>
    </div>
</div>

<?php include __DIR__ . '/../bottom.php'; ?>
