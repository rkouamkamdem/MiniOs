<?php include __DIR__ . '/../top.php'; ?>

<div class="container">
    <div class="row">
    <div class="col-md-12">
        <h2>Liste exhaustive des contacts.</h2>

        <!--<p class="bg-success">
            Ouvrez le fichier src/AppBundle/views/Home/bdd.php afin de regarder le code en même temps que les exemples
        </p> -->

        <h4>Nbre total d'utilisateur :  <?php echo count($contacts); ?></h4>

        <table class="table table-bordered">

            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Description</th>
                <th>Photo</th>
            </tr>
            <?php foreach($contacts as $contact): ?>
                <tr>
                    <td>
                        <?php echo $contact['nom']; ?>
                    </td>
                    <td>
                        <?php echo $contact['prenom']; ?>
                    </td>
                    <td>
                        <?php echo $contact['email']; ?>
                    </td>
                    <td>
                        <?php echo $contact['description']; ?>
                    </td>
                    <td>
                        <img src="<?php echo $asset('photos/'.$contact[0].''); ?>" class="img-circle" style="height: 100px;">
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
        <a href="<?php echo $path('Contact') ?>" class="btn btn-primary btn-block">Ajouter un contact</a>

    </div>
    </div>
</div>

<?php include __DIR__ . '/../bottom.php'; ?>