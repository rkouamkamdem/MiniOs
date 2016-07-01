<?php include __DIR__ . '/../top.php';

if( !empty($session) and empty($_SESSION['user']) )
    $_SESSION['user'] = $session;

if(!empty($_SESSION['user']))
{   //var_dump($_SESSION['user']);
    ?>

    <div class="container">
        <div class="col-md-12">
            <h2>Profil utilisateur de Mr/Mme  <?php echo $_SESSION['user']['nom']." "; echo $_SESSION['user']['prenom']; ?>. </h2>

            <table class="table table-bordered hover" >
                    <tr><th>Nom</th> <td><?php echo $_SESSION['user']['nom']; ?></td></tr>

                    <tr><th>Prenom</th><td><?php echo $_SESSION['user']['prenom']; ?></td></tr>

                    <tr><th>Username</th><td><?php echo $_SESSION['user']['username']; ?></td></tr>

                    <tr><th>Email</th><td><?php echo $_SESSION['user']['email']; ?></td>></tr>

                    <tr><th>password</th><td><?php echo $_SESSION['user']['password']; ?></td></tr>

                    <tr> <th>Action</th>
                        <td>
                            <a href="<?php echo $path('updateUser'); ?>?id=<?php echo $_SESSION['user']['id']; ?>" class="btn btn-primary btn-xs">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Modifier
                            </a>
                        </td>
                    </tr>
            </table>
        </div>
    </div>

<?php } include __DIR__ . '/../bottom.php'; ?>