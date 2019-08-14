<?php

    namespace App\Controller\Admin;

    use Core\HTML\BootstrapForm;



    class PostsController extends AppController{

    	/**
         * Charger les tables des articles et des catégories dans le constructeur
         */
        public function __construct(){
            parent::__construct();
            $this->loadModel('Post');
            $this->loadModel('Category');
        }



        /**
         * Lister les articles et les envoyer sur la page d'accueil du back-end
         * @return Contenu html
         */
        public function index(){
            $posts = $this->Post->all();
            $this->render('admin.posts.index', compact('posts'));
        }



        /**
         * Ajouter un article
         * @return Contenu html
         */
        public function add(){
            //Si des données sont envoyées
            if(!empty($_POST)){
                //Ajouter l'enregistrement dans la BDD
                $result = $this->Post->create([
                    'titre' => $_POST['titre'],
                    'contenu' => $_POST['contenu'],
                    'category_id' => $_POST['category_id']
                ]);

                if($result){
                    return $this->index();
                }
            }

            //récupérer les catégories de l'articles
            $categories = $this->Category->extract('id', 'titre');
            

            //Initialiser le formulaire
            $form = new BootstrapForm($_POST);


            //afficher l'article sur la page d'édition de l'article
            $this->render('admin.posts.edit', compact('categories', 'form'));
        }




        /**
         * Modifier un article 
         * @return Contenu html
         */
        public function edit(){
            //Si des données sont envoyées
            if(!empty($_POST)){
                //Modifier l'enregistrement dans la BDD en fonction de l'id
                $result = $this->Post->update($_GET['id'], [
                    'titre' => $_POST['titre'],
                    'contenu' => $_POST['contenu'],
                    'category_id' => $_POST['category_id']
                ]);

                if($result){
                    return $this->index();
                }
            }

            //récupérer l'article en fonction de son id
            $post = $this->Post->find($_GET['id']);

            //récupérer les catégories de l'articles
            $categories = $this->Category->extract('id', 'titre');

            // Initialiser le formulaire
            $form = new BootstrapForm($post);

            //afficher l'article sur la page d'édition de l'article
            $this->render('admin.posts.edit', compact('categories', 'form'));
        }




        /**
         * Supprimer un article 
         * @return Contenu html
         */
        public function delete(){
            //Si on demande à supprimer un article
            if(!empty($_POST)){
                $result = $this->Post->delete($_POST['id']);
                return $this->index();
            }
        }

    }


?>
