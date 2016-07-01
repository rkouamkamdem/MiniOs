<?php

namespace AppBundle\Controller;

use Framework\Controller;
use PDO;

class ProduitTypeController extends Controller
{
    public function readAction()
    {
        $request = $this->getRequest();
        $id = $request->get('id');
        $pdo = $this->getPdo();
        $produit = $pdo->query('Select * From produit WHERE id = '.$id.' ')->fetchAll();

        return $this->render('Produit/read.php',['produit' => $produit, 'id' => $id]);
    }

    public function ProduitTypeAction()
    {
        $pdo = $this->getPdo();
        $produitTypes = $pdo->query('Select * From produit_type')->fetchAll();
        //var_dump($produitTypes); die();
        return $this->render('Home/produitTypes.php', [
            'produitTypes' => $produitTypes,
        ]);
    }

    public function createAction()
    {
        $pdo = $this->getPdo();
        $request = $this->getRequest();
        $nomCategorie="";  $msgSuccess=""; $msgError ="";

        $readonly = "readonly='readonly'";

        if( !empty($request->get('categorie')['nom']) )
        {
            $nomCategorie = $request->get('categorie')['nom'];
            $sql = 'INSERT INTO produit_type (nom) VALUES(' . $pdo->quote($nomCategorie) . ') ';
            //echo $sql;
            $nbrLigne = $pdo->exec($sql);

            //Après la création je me dirige vers l'écran affichant toutes les categorie
            return $this->ProduitTypeAction();
        }
        return $this->render('ProduitType/create.php', [
            'nomCategorie' => $nomCategorie,
            'msgSuccess' => $msgSuccess,
            'msgError' => $msgError,
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
        $msgSuccess=""; $msgError ="";
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
            'created' => $created
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
    }
}
