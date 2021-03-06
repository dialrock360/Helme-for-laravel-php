<?php

    /*==================================================
    MODELE MVC DEVELOPPE PAR Ngor SECK
    ngorsecka@gmail.com
    (+221) 77 - 433 - 97 - 16
    PERFECTIONNEZ CE MODEL ET FAITES MOI UN RETOUR
    VOUS ETES LIBRE DE TOUTE UTILISATION
    Document redefini par samane_ui_admin de Pierre Yem Mback dialrock360@gmail.com
    ==================================================*/



    /*==================Classe creer par Samane samane_ui_admin le 10-11-2019 11:31:24=====================*/
 use libs\system\Controller;
  use src\entities\Status as StatusEntity;
  use src\model\StatusDB;

  class Status extends Controller{

            //A noter que toutes les views de ce controller doivent être créées dans le dossier view/test
                //Ne tester pas toutes les methodes, ce controller est un prototype pour vous aider à mieux comprendre
    /*------------------Methode index--------------------=*/
                
                public function index(){
                    return $this->view->load("status/index");
                }


    /*------------------Methode getID--------------------=*/
                
                public function getID( $id){
                    $data["id"] = $id;
                    return $this->view->load("status/get_id", $data);
                }


    /*------------------Methode get--------------------=*/
                
                public function get($id){
                    //Instanciation du model
                    $tdb = new StatusDB();
                    $data["status"] = $tdb->getStatus($id);
                    return $this->view->load("status/get", $data);
                }


    /*------------------Methode list--------------------=*/
                
            public function liste(){
                    //Instanciation du model
                    $tdb = new StatusDB();
                    $data["statuss"] = $tdb->listeStatus();
                    return $this->view->load("status/liste", $data);
                }


    /*------------------..............--------------------=*/
    /*------------------Methode add--------------------=*/
                
public function add(){
	//Instanciation du model
            $tdb = new StatusDB();
	//Récupération des données qui viennent du formulaire view/test/add.html (à créer)
            if(isset($_POST["valider"]))//"valider" est le name du champs submit du formulaire add.html
            {
                extract($_POST);
                $data["ok"] = 0;
                if(!empty($nom_status)) {
                    $statusObject  = new StatusEntity();
                    $statusObject ->setNom_status($nom_status);
                    $ok = $tdb->addStatus($statusObject );
                    $data["ok"] = $ok;
                }
                return $this->view->load("status/add", $data);
            }else{
                return $this->view->load("status/add");
            }
        }


    /*------------------Methode update--------------------=*/
                
		public function update(){
			//Instanciation du model
            $tdb = new StatusDB();
            if(isset($_POST["modifier"])){
                extract($_POST);
                if(!empty($nom_status)) {
                    $statusObject  = new StatusEntity();
                    $statusObject ->setId($id);
                    $statusObject ->setNom_status($nom_status);
                    $ok = $tdb->updateStatus($statusObject );
                }
            }
            return $this->liste();
       }

    /*------------------Methode list--------------------=*/
                
            public function delete($id){
              //Instanciation du model
                    $tdb = new StatusDB();
            			//Supression
            			$tdb->deleteStatus($id);
            //Retour vers la liste
                    return $this->liste();
                }


    /*------------------..............--------------------=*/
    /*------------------Methode edit--------------------=*/
                
            	public function edit($id){
                        //Instanciation du model
                       $tdb = new StatusDB();
            			//Supression
            			$data["status"] = $tdb->getStatus($id);
            			//chargement de la vue edit.html
                    return $this->view->load("status/edit", $data);
                   }




                   



               }


            ?>

