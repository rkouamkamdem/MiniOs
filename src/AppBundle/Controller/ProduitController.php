<?php

namespace AppBundle\Controller;

use Framework\Controller;
use PDO;

class ProduitController extends Controller
{
    public function readAction()
    {
        $request = $this->getRequest();
        $id = $request->get('id');
        $pdo = $this->getPdo();
        $produit = $pdo->query('Select * From produit WHERE id = '.$id.' ')->fetchAll();

        return $this->render('Produit/read.php',['produit' => $produit, 'id' => $id]);
    }
    
    public function produitsAction()
    {
        $pdo = $this->getPdo();
        $produits = $pdo->query('Select * From produit')->fetchAll();

        return $this->render('Home/produits.php', [
            'produits' => $produits,
        ]);
    }

    public function createAction()
    {
        //Récupération des catégories en vue des les associer aux produits dès la création
        
        $pdo = $this->getPdo();
        $request = $this->getRequest();
        //var_dump($request->get('produit')['nom']);die();

        //$produits = $pdo->query('Select * From produit')->fetchAll();
        $nomProduit="";  $description=""; $prix=0.0; $msgSuccess=""; $msgError ="";$prixTTC=0.0;
        $action = "createProduit";
        $disponible = "checked='checked'";
        $submitLib = "Créer le produit";
        $readonly = "readonly='readonly'";

        if( !empty($request->get('produit')['nom']) and !empty($request->get('produit')['description']) and !empty($request->get('produit')['prix']) )
        {
            $is_valid = true;
            $nomProduit=$request->get('produit')['nom'];
            $description = $request->get('produit')['description'];
            $prix = $request->get('produit')['prix'];
            $prix_ttc = 0.0;
            $created = new \DateTime("now");
            $dateCreation = $created->format('Y-m-d H:i:s');
            $produit_type_id = 1;
            //var_dump($dateCreation);die('passe par là!!!');produit_type_id

            $sql = 'INSERT INTO produit (
                nom,
                is_valid,
                description,
                created,
                prix_ht
            ) VALUES(
            ' . $pdo->quote($nomProduit) . ', 
            ' . $is_valid . ',
            ' . $pdo->quote($description) . ',
            ' . $pdo->quote($dateCreation) . ',
            ' . $prix . '
            )
            '; //,' . $prix_ttc . ','.$produit_type_id.'
            //echo $sql;
            $nbrLigne = $pdo->exec($sql);

            //Après la création je me dirige vers l'écran affichant tous les produits
            return $this->produitsAction();
            //return $this->render('Home/produits.php', []);//['produits' => $produits]
        }

        return $this->render('Produit/create.php', [
            'nomProduit' => $nomProduit,
            'description' => $description,
            'prix' => $prix,
            'prixTTC' => $prixTTC,
            'msgSuccess' => $msgSuccess,
            'msgError' => $msgError,
            'action' => $action,
            'disponible' => $disponible,
            'submitLib' => $submitLib,
            'readonly' => $readonly

        ]);
        //return $this->render('Produit/create.php', ['produit' => $produit, 'action' => $action] );
    }

    public function updateAction()
    {
        $request = $this->getRequest();
        //var_dump($request); die();
        $id = $request->get('id');
        $pdo = $this->getPdo();
        $msgSuccess=""; $msgError =""; $libelleForm="";
        //Mis à jour du produit
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (isset($_REQUEST['produit'])){
                $forms = $_REQUEST['produit'];
                $id = $forms['id'];
                //var_dump($forms); die();
                //Ma requête de mis à jour
                $sql = 'UPDATE produit SET 
                nom = :nom,
                is_valid = :is_valid,
                description = :description ,
                prix_ht = :prix_ht 
                WHERE id = :id';

                $forms['disponible'] = ( $forms['disponible'] === "on" ) ? 1 : 0;

                $updateProduit = $pdo->prepare($sql);
                $updateProduit->bindParam(':nom', $forms['nom'], PDO::PARAM_STR);
                $updateProduit->bindParam(':is_valid', $forms['disponible'], PDO::PARAM_BOOL);
                $updateProduit->bindParam(':description', $forms['description'], PDO::PARAM_STR);
                $updateProduit->bindParam(':prix_ht', $forms['prix'], PDO::PARAM_STR);
                $updateProduit->bindParam(':id', $id, PDO::PARAM_INT);
                $updateProduit->execute();

            }
            $msgSuccess="Modification reussie !!!"; $msgError ="";
        }
        
        $produitSingle = $pdo->query('Select * From produit WHERE id = '.$id.' ')->fetchAll();
        //var_dump($produitSingle); die();
        $action = "updateProduit";
        $nomProduit = $produitSingle[0]['nom'];
        $description = $produitSingle[0]['description'];
        $prix = $produitSingle[0]['prix_ht'];
        $prixTTC = $produitSingle[0]['prix_ttc'];
        $disponible = ( $produitSingle[0]['is_valid'] == 1) ? "checked='checked'" : "" ;
        $submitLib = "Modifier le produit";
        $readonly = "readonly='readonly'";
        $created = $produitSingle[0]['created'];
        $libelleForm = "Modification du produit N° ".$id."";

       // var_dump($produitSingle);die();
        return $this->render('Produit/update.php', [
            'produitSingle' => $produitSingle,
            'id' => $id,
            'nomProduit' => $nomProduit,
            'description' => $description,
            'prix' => $prix,
            'prixTTC' => $prixTTC,
            'msgSuccess' => $msgSuccess,
            'msgError' => $msgError,
            'action' => $action,
            'disponible' => $disponible,
            'submitLib' => $submitLib,
            'readonly' => $readonly,
            'created' => $created,
            'libelleForm' => $libelleForm
        ]);
    }

    public function deleteAction()
    {
        $request = $this->getRequest();
        $id = $request->get('id');
        $pdo = $this->getPdo();

        $sql = 'DELETE FROM produit WHERE id = :id';
        $removeProduit = $pdo->prepare($sql);
        $removeProduit->bindParam(':id', $id, PDO::PARAM_INT);
        $removeProduit->execute();
        //Après la suppression   je me dirige vers l'écran affichant tous les produits
        return $this->produitsAction();
        /*
        $produits = $pdo->query('Select * From produit WHERE id = '.$id.' ')->fetchAll();
        return $this->render('Home/produits.php', [
            'produits' => $produits,
        ]);*/
    }
}
