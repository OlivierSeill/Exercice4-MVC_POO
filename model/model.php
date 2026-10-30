<?php

/*
FICHIER MODEL pour gérer les interractions avec la BDD concernant la table Vendeur
*/

class Model {
    //ATTRIBUT
    private int $idCategory;
    private string $produit;
    private string $category;
    private PDO $pdo;

    //CONSTRUCTEUR
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    //GETTER & SETTER
    /**
     * Get the value of idCategory
     *
     * @return int
     */
    public function getIdCategory(): int {
        return $this->idCategory;
    }

    /**
     * Set the value of idCategory
     *
     * @param int $idCategory
     *
     * @return self
     */
    public function setIdCategory(int $idCategory): self {
        $this->idCategory = $idCategory;
        return $this;
    }

    /**
     * Get the value of produit
     *
     * @return string
     */
    public function getProduit(): string {
        return $this->produit;
    }

    /**
     * Set the value of produit
     *
     * @param string $produit
     *
     * @return self
     */
    public function setProduit(string $produit): self {
        $this->produit = $produit;
        return $this;
    }

    /**
     * Get the value of category
     *
     * @return string
     */
    public function getCategory(): string {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @param string $category
     *
     * @return self
     */
    public function setCategory(string $category): self {
        $this->category = $category;
        return $this;
    }

    /**
     * Get the value of pdo
     *
     * @return PDO
     */
    public function getPdo(): PDO {
        return $this->pdo;
    }

    /**
     * Set the value of pdo
     *
     * @param PDO $pdo
     *
     * @return self
     */
    public function setPdo(PDO $pdo): self {
        $this->pdo = $pdo;
        return $this;
    }

    //Recupération Liste des produits
    public function findAll() {
        try{
            //2) Préparer la requête SELECT pour récupérer le nom des produits et leur catégorie
            $request = $this->pdo->prepare('SELECT p.produit, c.category FROM produit p INNER JOIN category c ON p.id_category = c.id_category;');

            //3) Envoyer la requête à la BDD
            $request->execute();

            //4) Récupérer la réponse de la BDD
            // PDO::FETCH_ASSOC : permet de récupérer la réponse uniquement sous forme de tableaux associatifs
            $data = $request->fetchAll(PDO::FETCH_ASSOC);

            // je teste $data en l'affichant pour savoir si tout se passe bien et que je récupère des données
            //print_r($data);
            return $data;

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

    public function listAll() {
        try{
            //2) Préparer la requête SELECT pour récupérer le nom des produits et leur catégorie
            $request = $this->pdo->prepare('SELECT p.produit, c.category FROM produit p INNER JOIN category c ON p.id_category = c.id_category;');

            //3) Envoyer la requête à la BDD
            $request->execute();

            //4) Récupérer la réponse de la BDD
            // PDO::FETCH_ASSOC : permet de récupérer la réponse uniquement sous forme de tableaux associatifs
            $data = $request->fetchAll(PDO::FETCH_ASSOC);

            // je teste $data en l'affichant pour savoir si tout se passe bien et que je récupère des données
            //print_r($data);

            // Affichage des Produits : 2nd Méthode
            //5) Mettre en forme la réponse avec une boucle
            $product = "";
            foreach($data as $tab){
                $product = $product."<li>{$tab["produit"]} : {$tab["category"]}</li>";
            }
            return $product;

        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }   
}
?>