<?php

    namespace App\Controller\Admin;

    use Core\HTML\BootstrapForm;



    class CategoriesController extends AppController{

        /**
         * Charger la table des catégories dans le constructeur
         */
        public function __construct(){
            parent::__construct();
            $this->loadModel('Category');
        }



        /**
         * Lister les catégories et les envoyer sur la page d'accueil des catégories du back-end
         * @return Contenu html
         */
        public function index(){
            $items = $this->Category->all();
            $this->render('admin.categories.index', compact('items'));
        }



        /**
         * Ajouter une catégorie
         * @return Contenu html
         */
        public function add(){
            //Si des données sont envoyées
            if(!empty($_POST)){
                //Ajouter l'enregistrement dans la BDD
                $result = $this->Category->create([
                    'titre' => $_POST['titre'],
                ]);
                return $this->index();
            }

            //Initialiser le formulaire
            $form = new BootstrapForm($Category);

            //afficher la catégorie sur la page d'édition de la catégorie
            $this->render('admin.categories.edit', compact('form'));
        }



        /**
         * Modifier une catégorie 
         * @return Contenu html
         */
        public function edit(){
            //Si des données sont envoyées
            if(!empty($_POST)){
                //Modifier l'enregistrement dans la BDD en fonction de l'id
                $result = $this->Category->update($_GET['id'], [
                    'titre' => $_POST['titre'],
                ]);

                $form = new BootstrapForm($Category);return $this->index();
            }

            //récupérer la catégorie en fonction de son id
            $category = $this->Category->find($_GET['id']);
            
            // Initialiser le formulaire
            $form = new BootstrapForm($category);
            
            //afficher la catégorie sur la page d'édition de la catégorie
            $this->render('admin.categories.edit', compact('form'));
        }



        /**
         * Supprimer une catégorie 
         * @return Contenu html
         */
        public function delete(){
            //Si on demande à supprimer un article
            if(!empty($_POST)){
                $result = $this->Category ->delete($_POST['id']);
                return $this->index();
            }
        }

    }


?>
