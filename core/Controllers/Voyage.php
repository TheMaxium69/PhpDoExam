<?php

namespace Controllers;

class Voyage extends Controller
{
    protected $modelName = \Model\Voyage::class;
 
    public function del()
    {
        
        $voyage_id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

            $voyage_id = $_GET['id'];
        }

        if(!$voyage_id){
            die("il faut absolument entrer un id dans l'url pour que le script fonctionne");
        }

        $this->model->delete($voyage_id);

        \Http::redirect('index.php?controller=velo&task=index');

    }

    public function add(){

        $voyageAdd = false;

        if(!empty($_POST['description']) && !empty($_POST['image']) && !empty($_POST['velo_id'])){
            $description = htmlspecialchars($_POST['description']);
            $image = htmlspecialchars($_POST['image']);
            $velo_id = htmlspecialchars($_POST['velo_id']);
            $voyageAdd = true;
            
        }

        if ($voyageAdd == true) {
            $this->model->insert($description, $image, $velo_id);

            \Http::redirect("index.php?controller=velo&task=show&id=$velo_id");
        }else{

            $voyageEdit = false;

            if( !empty($_GET['id']) && ctype_digit($_GET['id'])   ){

                $voyage_id = $_GET['id'];
                $voyageEdit = true;

            }


            if(!$voyageEdit){
                $voyage = null;
                $titreDeLaPage = "nouveau voyage";
                \Rendering::render('voyage/voyageform',
                    compact('voyage','titreDeLaPage'));
            }else{

                $voyage = $this->model->find($voyage_id);
                $voyageName = $voyage['description'];


                $titreDeLaPage = "Editer $voyageName";
                \Rendering::render('voyage/voyageform',
                    compact('voyage','titreDeLaPage'));

            }



        }

    }

   /* public function edit(){

        if(!empty($_POST['name']) && !empty($_POST['gout']) && !empty($_POST['id']) && ctype_digit($_POST['id'])){

            $gateau_id = $_POST['id'];
            $name = htmlspecialchars($_POST['name']);
            $gout = htmlspecialchars($_POST['gout']);


            $this->model->update($gateau_id, $name, $gout);


            \Http::redirect("index.php?controller=gateau&task=show&id=$gateau_id");


        }else{
            die('tu essayes de faire quoi la ?');
        }
    }*/

}

