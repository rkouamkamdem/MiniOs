<?php
namespace AppBundle\Controller;

use Framework\Controller;
use PDO;

class UserController extends Controller
{
    public function showUserAction(){
        return $this->render('User/register.php');
    }
    
    public function userLogoutAction(){
        $deconnexion ="oui";
        return $this->render('Home/index.php',['deconnexion' => $deconnexion]);
    }

    
    public function registerAction()
    {
        $pdo = $this->getPdo();
        $request = $this->getRequest();

        if($_SERVER['REQUEST_METHOD'] === 'POST') 
        {
            if( isset($_REQUEST['inscription']) )
            {
                $forms = $_REQUEST['inscription'];
                $nom = $forms['nom'];
                $prenom = $forms['prenom'];
                $username = $forms['username'];
                $email = $forms['email'];
                $password = $forms['password'];
                
                $sql = 'INSERT INTO user (
                nom,
                prenom,
                username,
                email,
                password
                ) VALUES(
                :nom, 
                :prenom,
                :username,
                :email,
                :password
                )
                ';
                $insertUser = $pdo->prepare($sql);
                $insertUser->bindParam(':nom', $nom, PDO::PARAM_STR);
                $insertUser->bindParam(':prenom',$prenom, PDO::PARAM_STR);
                $insertUser->bindParam(':username', $username, PDO::PARAM_STR);
                $insertUser->bindParam(':email', $email, PDO::PARAM_STR);
                $insertUser->bindParam(':password', $password, PDO::PARAM_STR);
                $insertUser->execute();

                //echo $sql;//$nbrLigne = $pdo->exec($sql);

                $id = $pdo->lastInsertId();
                $_SESSION['user']['nom'] = $nom;
                $_SESSION['user']['prenom'] = $prenom;
                $_SESSION['user']['username'] = $username;
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['password'] = $password;
                $_SESSION['user']['id'] = $id;
            }
        }
        
        return $this->render('User/register.php', 
            ['nom' => $nom,
             'prenom' => $prenom,
             'username' => $username, 
                'email' => $email,
              'password' => $password,
              'id' => $id,
               'session' =>  $_SESSION['user']
            ]);
    }

    public function loginAction()
    {
        $pdo = $this->getPdo();
        $request = $this->getRequest();

        if( $_SERVER['REQUEST_METHOD'] === 'POST' )
        {
            if( isset($_REQUEST['login']) )
            {
                $forms = $_REQUEST['login'];
                
                $email = $forms['email'];
                $password = $forms['password'];

                $sql = 'SELECT * FROM user WHERE email = :email and password = :password  LIMIT 1';
                $query = $pdo->prepare($sql);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':password', $password, PDO::PARAM_STR);

                $query->execute();

                $user = $query->fetchObject();

                $_SESSION['user']['nom'] = $user->nom;
                $_SESSION['user']['prenom'] = $user->prenom;
                $_SESSION['user']['username'] = $user->username;
                $_SESSION['user']['email'] = $user->email;
                $_SESSION['user']['password'] = $user->password;
                $_SESSION['user']['id'] = $user->id;
                //var_dump($user); var_dump($_SESSION['user']);die();
            }
        }
        return $this->render('Home/index.php',['session' => $_SESSION['user']]);
        //return $this->render('Home/index.php');
    }
}