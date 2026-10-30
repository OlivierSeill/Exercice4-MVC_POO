<?php
/* FICHIER VIEW pour l'Accueil
*/

class View {
    //ATTRIBUT
    private array $data;
    private string $product;

    //CONSTRUCTEUR

    //GETTER & SETTER
    /**
     * Get the value of data
     *
     * @return array
     */
    public function getData(): array {
        return $this->data;
    }

    /**
     * Set the value of data
     *
     * @param array $data
     *
     * @return self
     */
    public function setData(array $data): self {
        $this->data = $data;
        return $this;
    }

    /**
     * Get the value of product
     *
     * @return string
     */
    public function getProduct(): string {
        return $this->product;
    }

    /**
     * Set the value of product
     *
     * @param string $product
     *
     * @return self
     */
    public function setProduct(string $product): self {
        $this->product = $product;
        return $this;
    }

    
    //METHOD
    public function display(){
        ?>
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>
            <body>
                <main>
                    <h1>Liste de Produits : 1er Méthode</h1>
                    <ul>
                        <?php 
                            //Affichage des produits : 1er Méthode
                            foreach($this->data as $produit){
                                echo("<li>".htmlentities($produit['produit'])." : ".htmlentities($produit['category'])."</li>");
                            }
                        ?>
                    </ul>
                    <h1>Liste de Produits : 2nd Méthode</h1>
                    <ul>
                        <?php
                            echo($this->product);
                        ?>
                    </ul>
                </main>
            </body>
            </html>
        <?php
    }    
}
?>