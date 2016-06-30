<?php

namespace AppBundle\Controller;

use Framework\Controller;

class ContactController extends Controller
{
    public function contactAction()
    {
        $errors = []; //initialise le tableau des erreurs;
        $nom=""; $prenom=""; $email=""; $description=""; $photo="";
        $msgError = "";$msg_upload ="";

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //if (isset($_REQUEST['input'])) {
            if (isset($_REQUEST['input'])) {
                //var_dump($_REQUEST['input']);//=== false //$_POST
                $forms = $_REQUEST['input'];//$forms = $_REQUEST['input'];
                //var_dump($forms);
                //var_dump($forms['nom']);
                if ( empty($forms['nom']) ) {
                    $errors[] = 'Le champs [Nom] ne doit pas être vide';
                    //echo "J'entre ici meme si je suis fourni !!!<br /> ma valeur == [" . $forms['nom'] . "] ";
                }
                if (empty($forms['prenom']) ) {
                    $errors[] = 'Le champs [Prenom] ne doit pas être vide';
                }

                if ( empty($forms['email']) ) {
                    $errors[] = 'Le champs [Email] ne doit pas être vide';
                }
                else
                {
                    // test de l'adresse e-mail
                    if(!filter_var($forms['email'], FILTER_VALIDATE_EMAIL))
                        $errors[] =  "L'adresse e-mail [".$forms['email']."] n'est pas valide";
                }

                if (empty($forms['description'])) {
                    $errors[] = 'Le champs [Description] ne doit pas être vide';
                    //echo "J'entre ici meme si je suis fourni !!!<br /> ";
                }
                if (empty($_FILES["input"]["name"]["photo"])) {
                    $errors[] = 'Le champs [Photo] ne doit pas être vide';
                }

                $nom = $forms['nom'];
                $prenom = $forms['prenom'];
                $email = $forms['email'];
                $description = $forms['description'];
                $photo = $_FILES["input"]["name"]["photo"];
                $array_url_tmp_photo = $_FILES["input"]["tmp_name"];


                //$str_dir =" Je suis ici [".__DIR__."] !!! ";
                    //include __DIR__ . '/../../../web/photos/test.php';
                //var_dump($str_dir);//($_FILES["input"]["tmp_name"]["photo"]);

                //s'il ya le moinfdre problème de validation de formulaire on concatene les différentes erreurs recencées.
                if( count($errors) > 0 ) {
                    $msgError = "Attention, <br />";
                    foreach ($errors as $value) {
                        $msgError .= $value . "<br >";
                    }
                }//Si on a aucune erreur, on peut charger notre fichier et stocker les données dans un fichier json
                elseif( count($errors) == 0 )
                {
                    $url_photo =  __DIR__ . '/../../../web/photos/' . $_FILES["input"]["name"]["photo"];
                    if (move_uploaded_file($array_url_tmp_photo['photo'], $url_photo))
                        $msg_upload = "Votre fichier a bien été chargé.<br />";

                    $jsonfile = __DIR__ . '/../../../web/file/JsonFile.json';

                    $oldData = ""; $data = array();$strData="";

                    //Récupération des valeurs courantes
                    $currentData = $_REQUEST['input'];
                    $currentData[] = $_FILES['input']['name']['photo'];
                    $currentData[] = $_FILES['input']['type']['photo'];
                    $currentData[] = $_FILES['input']['size']['photo'];
                    $currentData[] = $url_photo;//Url de la photo

                    //Pareil je serialise mon tableau qui contient les données courantes
                    $strCurrentData = serialize($currentData);
                    $strData = $strCurrentData;

                    //var_dump(unserialize($strData));

                    //si le fichier existe déjà, alors je recupère son contenu ziper son contenu
                    if(file_exists($jsonfile))
                    {
                        //je récupère ce qui existait avant sous forme de tableau
                        $oldData = json_decode(file_get_contents($jsonfile),true);

                        //je transforme le tableau obtenu ci dessus en string
                        $strOldData = serialize($oldData);

                        //Je concatene la chaine obtenue avec l'entrée courante
                        $strData = $strOldData.$strCurrentData;

                        //var_dump($strData);
                        //die();

                    }
                    //$testStrData = $strData;
                    //var_dump($testStrData);

                    /*
                    //j'ouvre mon fichier en écriture
                    $handle = fopen($jsonfile, "w+");

                    //Ensuite j'écris dans mon fichier en encodant le tout en JSON
                    fwrite($handle,json_encode($strData));
                    fclose($handle);*/

                    //Enregistrement dans un fichier JSON les données contenue dans le formulaire
                    if(file_put_contents($jsonfile,json_encode($strData)) !== false )
                        $msg_upload = $msg_upload."Vos données de formulaire bien été chargées dans le fichier [web/file/JsonFile.json].<br />";

                    $mailContent = "Bonjour, nous vous confirmaons lacréation de votre compte sur notre site.";
                    //envoie de mail
                    if( $this->envMail($email,$mailContent) )
                        $msg_upload = $msg_upload."Votre mail à destination de [".$email."] a bien été envoyé.<br />";
                }

            }
        }

        return $this->render('Home/contact.php', ['nom' => $nom,'prenom' => $prenom, 'email' => $email, 'description' => $description, 'photo' => $photo, 'msgError' => $msgError, 'msg_upload' => $msg_upload ] );
    }

    //Ma fonction d'envoie de mail
    public function envMail($userMail,$mailContent)
    {
        $subject = 'Mail de confirmation de création de compte';
        $headers = 'From: rkamdemkouam@gmail.com' . "\r\n" .
            'Reply-To: rkamdemkouam@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        try{
            mail($userMail, $subject, $mailContent, $headers);
        }catch (\Exception $e){
            echo $e->getMessage();
        }

    }

    //Ma fonction de listing des contacts
    public function listAction()
    {
        $jsonfile = __DIR__ . '/../../../web/file/JsonFile.json';
        if(file_exists($jsonfile))
        {
            $contactsData = json_decode(file_get_contents($jsonfile), true);

            //var_dump($contactsData);
            //Je retransforme ma chaine sérialisée en tableau, en l'explosant
            $contactsData = explode("a:8:",$contactsData);
            //echo "<br /><br />Nbre de Contact après avoir exploser la chaine \$contacts ci-dessus: [".count($contactsData)."]<br />";
            //echo "<br />-----------------------------------------------------------<br />";
            //Je supprime le 1er elt de mon tableau car il ne contient rien du tout
            unset($contactsData[0]);


            //echo "<br />---------------Nbre de Contact après suppression de l'elt 0: [".count($contactsData)."]-------------------------------<br />";
            $nbrContact = count($contactsData);
            //var_dump($contactsData);

            /*
            echo "<br />-----------------------------------------------------------<br />";
            var_dump($contacts[1]); //var_dump(unserialize("a:8:".$contacts[1]));
            echo "<br />-----------------------------------------------------------<br />";
            var_dump($contacts[2]); // var_dump(unserialize("a:8:".$contacts[2]));
            echo "<br />-----------------------------------------------------------<br />";
            var_dump($contacts[3]); //var_dump(unserialize("a:8:".$contacts[3]));
            echo "<br />-----------------------------------------------------------<br />";
            die(); */
            //var_dump(unserialize("a:8:".$contacts[$i]));

            $contacts = array();
            for($i = 1; $i <= $nbrContact; $i++)
            {
                //echo "<br />-----------------------------[".$i."]------------------------------<br />";
                //var_dump(unserialize("a:8:".$contactsData[$i]));
                $contacts[] = unserialize("a:8:".$contactsData[$i]);
            }
            //var_dump($contacts);
            //echo "<br />---------------Nbre de Contact après suppression de l'elt 0: [".count($contactsData)."]-------------------------------<br />";

            return $this->render('Contact/list.php', ['contacts' => $contacts] );
        }
        
    }

}