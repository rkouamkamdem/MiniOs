<?php include __DIR__ . '/../top.php';

    if(!empty($produits))
    {
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Liste exhaustive des produits.</h2>

                <!--<p class="bg-success">
                    Ouvrez le fichier src/AppBundle/views/Home/bdd.php afin de regarder le code en même temps que les exemples
                </p> -->

                <h4>Nbre total de produits :  <?php echo count($produits); //var_dump($produits); //echo count($produits); ?></h4>

                <table class="table table-bordered">

                    <tr>
                        <th>Nom produit</th>
                        <th>Date de création</th>
                        <th>Disponibilité</th>
                        <th>Prix HT en €</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($produits as $produit): ?>
                        <tr>
                            <td>
                                <?php echo $produit['nom']; ?>
                            </td>
                            <td>
                                <?php echo $produit['created']; ?>
                            </td>
                            <td>
                                <?php if( $produit['is_valid'] == 1 ) echo "Oui"; else echo "Non"; ?>
                            </td>
                            <td>
                                <?php echo $produit['prix_ht']; ?>
                            </td>
                            <td>
                                <a href="<?php echo $path('showProduit'); ?>?id=<?php echo $produit['id']; ?>" class="btn btn-success btn-xs">
                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Voir
                                </a>
                                <a href="<?php echo $path('updateProduit'); ?>?id=<?php echo $produit['id']; ?>" class="btn btn-primary btn-xs">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modifier
                                </a>
                                <a href="<?php echo $path('deleteProduit'); ?>?id=<?php echo $produit['id']; ?>" class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Supprimer
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"><h2><a class="btn btn-primary btn-block" href="<?php echo $path('createProduit') ?>" >Créer un produit</a></h2></div>
        </div>

    </div>
        <?php
    }
?>

<?php include __DIR__ . '/../bottom.php'; ?>