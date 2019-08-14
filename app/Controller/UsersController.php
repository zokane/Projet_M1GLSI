<?php

    namespace App\Controller;

    use Core\Html\BootstrapForm;
    use Core\Auth\DBAuth;
    use \App;

    


    class UsersController extends AppController{

        /**
         * Permettre à l'utilisateur de se connecter
         * @return Contenu html
         */
        public function login(){
            $errors = false;

            // Vérifier que les données ont été postées
            if(!empty($_POST)){
                //initialiser l'authentification 
                $auth = new DBAuth(App::getInstance()->getDb());

                //si l'utilisateur se connecte
                if($auth->login($_POST['username'], $_POST['password'])){
                    header('location: index.php?p=admin.posts.index');
                }
                else{
                    $errors = true;
                }
            }



            // Initialiser le formulaire
            $form = new BootstrapForm($_POST);


            //Afficher le formulaire de connexion sur la page de login
            $this->render('users.login', compact('form', 'errors'));
                    
        }
    }


 ?>
