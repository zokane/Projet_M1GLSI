<?php

    namespace App\Entity;

    use Core\Entity\Entity;



    class CategoryEntity extends Entity{

        /**
         * Retourner le lien de l'article
         * @return string
         */
        public function getUrl(){
          return 'index.php?p=posts.category&id=' . $this->id;
        }
    }


?>
