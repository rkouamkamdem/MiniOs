<?php include __DIR__ . '/../top.php';

if(!empty($produit))
{
    ?>
    
    <div class="container">
        <div class="col-md-12">
            <h2>Detail du produit N° <?php echo $id; //var_dump($produit); ?>. </h2>

            <table class="table table-bordered hover" >
                <?php foreach($produit as $value): ?>

                    <tr><th>Nom produit</th> <td><?php echo $value['nom']; ?></td></tr>

                    <tr><th>Date de création</th><td><?php echo $value['created']; ?></td></tr>

                    <tr><th>Disponibilité</th><td><?php if( $value['is_valid'] == 1 ) echo "Oui"; else echo "Non"; ?></td></tr>

                    <tr><th>Description</th><td><?php echo $value['description']; ?></td>></tr>

                    <tr><th>Prix HT en €</th><td><?php echo $value['prix_ht']; ?></td></tr>

                    <tr><th>Catégorie associée </th><td><?php if( $value['produit_type_id'] !== NULL ) echo $value['produit_type_id']; else echo "Aucune"; ?></td></tr>

                    <tr> <th>Action</th>
                        <td>
                            <a href="<?php echo $path('updateProduit'); ?>?id=<?php echo $value['id']; ?>" class="btn btn-primary btn-xs">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modifier
                            </a>
                            <a href="<?php echo $path('deleteProduit'); ?>?id=<?php echo $value['id']; ?>" class="btn btn-danger btn-xs">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>

<?php } include __DIR__ . '/../bottom.php'; ?>