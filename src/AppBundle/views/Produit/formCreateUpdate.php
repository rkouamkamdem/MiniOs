<div class="container">

    <div class="col-md-12 well">
        <form method="post" action="<?php echo $path($action) ?>" class="form-horizontal" >
            
            <input type="hidden" name="produit[id]" value="<?php echo $id; ?>" />

            <div class="form-group">
                <label for="produitNom" class="col-sm-2 control-label" >Nom produit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="produitNom" placeholder="Nom produit" name="produit[nom]" required value="<?php echo $nomProduit; ?>" >
                </div>
            </div>

            <div class="form-group">
                <label for="produitDescription" class="col-sm-2 control-label">Description du produit</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" placeholder="Description du produit" id="produitDescription" required name="produit[description]"  ><?php echo $description; ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="produitPrix" class="col-sm-2 control-label">Prix HT</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="produitPrix" placeholder="Prix HT" name="produit[prix]"  required value="<?php echo $prix; ?>" >
                </div>
            </div>

            <div class="form-group">
                <label for="produitPrixTTC" class="col-sm-2 control-label">Prix TTC</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="produitPrixTTC" placeholder="Prix TTC" name="produit[prixTTC]" <?php echo $readonly; ?> required value="<?php echo $prixTTC; ?>" >
                </div>
            </div>

            <div class="form-group">
                <label for="produitDisponible" class="col-sm-2 control-label">Disponibilité</label>
                <div class="col-sm-10">
                    <input type="checkbox" class="form-control" id="produitDisponible" placeholder="Disponibilité" name="produit[disponible]" <?php echo $disponible; ?> required >
                </div>
            </div>


            <div class="form-group">

                <div class="col-sm-10">
                    <input type="submit" class="form-control btn btn-primary" id="produit['bouton']" placeholder="Créer" value="<?php echo $submitLib; ?>" >
                </div>
            </div>

        </form>
    </div>
</div>