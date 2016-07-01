<?php

namespace AppBundle\Controller;

use Framework\Controller;
use PDO;

class ValidInscriptionController extends Controller
{
    
    //Ma fonction de validation du formulaire d'inscription
    public function validInscriptionAction()
    {

        $request = $this->getRequest();
        //$response = $this->getRequest()
        //$id = $request->get('id');


        if( $_SERVER['REQUEST_METHOD'] === 'POST' )
        {
            if (isset($_REQUEST['email']))
            {
                $email = $_REQUEST['email'];
                $pdo = $this->getPdo();
                $sql = "Select * From user WHERE email = '".$email."' LIMIT 1";
                $user = $pdo->query($sql)->fetchAll();
                //var_dump($_REQUEST['email']);die('je suis dans mon controller :::  3333 : '.$sql.'');
            }
        }
        $count = count($user);
        if( $count > 0 )
            exit(json_encode(['email' => $email, 'user' => $user, 'count' => $count]));
    }

}