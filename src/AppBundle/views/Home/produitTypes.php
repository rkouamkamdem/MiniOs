<?php include __DIR__ . '/../top.php';

if(!empty($produitTypes) )
{
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Liste exhaustive des catégories de produits.</h2>

                <!--<p class="bg-success">
                    Ouvrez le fichier src/AppBundle/views/Home/bdd.php afin de regarder le code en même temps que les exemples
                </p> -->

                <h4>Nbre total de Type de produits :  <?php echo count($produitTypes); //var_dump($produits); //echo count($produits); ?></h4>

                <table class="table table-bordered">

                    <tr>
                        <th>Identifiant catégorie</th>
                        <th>Nom de catégorie</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($produitTypes as $produitType): ?>
                        <tr>
                            <td>
                                <?php echo $produitType['id']; ?>
                            </td>
                            
                            <td>
                                <?php echo $produitType['nom']; ?>
                            </td>
                            
                            <td>
                                <a href="<?php echo $path('showProduitType'); ?>?id=<?php echo $produitType['id']; ?>" class="btn btn-success btn-xs">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Voir
                                </a>
                                <a href="<?php echo $path('updateProduitType'); ?>?id=<?php echo $produitType['id']; ?>" class="btn btn-primary btn-xs">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modifier
                                </a>
                                <a href="<?php echo $path('deleteProduitType'); ?>?id=<?php echo $produitType['id']; ?>" class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Supprimer
                                </a>
                            </td>
                            
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"><h2><a class="btn btn-primary btn-block" href="<?php echo $path('produitTypeCreate') ?>" >Créer une catégorie</a></h2></div>
        </div>

    </div>
    <?php
}
?>

<?php include __DIR__ . '/../bottom.php'; ?>