<?php
/*
FICHIER CONTROLLER pour la page d'Accueil
*/

require_once '../model/model.php';
require_once '../view/view.php';

class Controller {
    //ATTRIBUT
    private Model $model;
    private View $view;

     //CONSTRUCTEUR
    public function __construct(Model $model, View $view){
        $this->model = $model;
        $this->view = $view;
    }

    //GETTER & SETTER
    /**
     * Get the value of model
     *
     * @return Model
     */
    public function getModel(): Model {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @param Model $model
     *
     * @return self
     */
    public function setModel(Model $model): self {
        $this->model = $model;
        return $this;
    }

    /**
     * Get the value of view
     *
     * @return View
     */
    public function getView(): View {
        return $this->view;
    }

    /**
     * Set the value of view
     *
     * @param View $view
     *
     * @return self
     */
    public function setView(View $view): self {
        $this->view = $view;
        return $this;
    }

    public function render(){
        //1.Récupérer les données utilisateurs
        // -> appelle à findAll() du model et stocker les données retournés dans une variable
        $data = $this->model->findAll();
        $product = $this->model->listAll(); 

        //2. Vérifier les data pour savoir si je reçois un tableau de donnée ou un message d'erreur
        switch(gettype($data)){
            case "string" :
                //Cas où on reçoit un message d'erreur
                $this->view->setData([]);
                $this->view->setProduct($messageError)->display();
                break;
            case "array" :
                //Cas où on reçoit nos données
                $array = $data;
                $list = $product;
                $this->view->setData($array)->setProduct($list)->display();
                break;
        }
    }

    
}

//Rendu de la page d'accueil
//Création d'un objet Controller Accueil pour après effectuer le rendu de la page
$model = new Model(new PDO("mysql:host=localhost;dbname=ticket","root",""));
$view = new View();

$controller = new Controller($model,$view);

//Lancer le rendu
$controller->render();