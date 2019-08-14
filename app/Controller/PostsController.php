<?php

    namespace App\Controller;

    use Core\Controller\Controller;



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
         * Affichage du contenu de la home page
         * @return Contenu html
         */
        public function index(){
            //Lister les articles et les catégories
            $posts = $this->Post->last();
            $categories = $this->Category->all();

            //Générer la vue de la home page pour récupérer le contenu html
            //passer les variables posts et categories dans la fonction compact pour générer leurs valeurs automatiquement
            $this->render('posts.index', compact('posts','categories'));
        }



        /**
         * Afficher les articles en fonction de la catégorie
         */
        public function category(){
            //stocker la catégorie demandé en fonction de son id
            $categorie = $this->Category->find($_GET['id']);


            //si la valeur des paramètres URL n'existent pas, on redirige vers la page 404
            if($categorie === false){
                $this->notFound();
            }

            
            //stocker les articles de la catégorie correspondante
            $articles = $this->Post->lastByCategory($_GET['id']);
            

            //Afficher toutes les catégories
            $categories = $this->Category->all();


            //Générer la vue de la page category pour récupérer le contenu html
            $this->render('posts.category', compact('articles','categories', 'categorie'));


        }



        /**
         * Afficher l'article de la single page en fonction de son id
         */
        public function single(){
            $article = $this->Post->findWitdhCategory($_GET['id']);
            $this->render('posts.single', compact('article'));
        }

    }


?>
