<?php
class CisternaController
{	
    public function __construct(){}
    
    public function index(){
        require_once('../model/Cisterna.php');
        $cisternas = Cisterna::findAll();
        //$cisternas = [new Cisterna (null,'hola','chau'), new Cisterna(null,'CHAU','ALO')];
        require_once('../view/viewCisterna.php');
        
    }
    
    public function nuevo(){
        echo 'ir a la ruta de creacion de cisterna';
    }
    
    public function insert($cisterna){
        require_once('../model/Cisterna.php');
        var_dump("insert: ".$cisterna->insert()." e ir al index de vista.");
        //header('Location: ../index.php');
    }
    public function update($cisterna){
        require_once('../model/Cisterna.php');
        var_dump("update: ".$cisterna->update()." e ir al index de vista.");
        //header('Location: ../index.php');
    }
    public function delete($cisterna){
        require_once('../model/Cisterna.php');
        var_dump("delete: ".$cisterna->delete()." e ir al index de vista.");
        //header('Location: ../index.php');
    }
    
}
//obtiene los datos de cisterna desde la vista y redirecciona a CisternaController.php
//isset — Determina si una variable está definida y no es NULL
if (isset($_POST['action'])) {
    $cisternaController = new CisternaController();
    require_once('../model/Cisterna.php');
// a traves del metodo POST viaja la informacion insertada en un formulario
    switch ($_POST["action"]){
        case ('nuevo'):
            if (!empty($_POST['TotalLitros']) && !empty($_POST['NombreCisterna']))
            {
                $cisterna = new Cisterna(NULL,$_POST['TotalLitros'],$_POST['NombreCisterna']);
                $cisternaController->insert($cisterna);
            }
            else
            {
                echo "campos incompletos";
            }
        break;
        
        case ('editar'):
        if (!empty($_POST["IDCisterna"]))
        {
            $cisterna = new Cisterna($_POST['IDCisterna'],$_POST['TotalLitros'],$_POST['NombreCisterna']);
            $cisternaController->update($cisterna);
             
        }
        else
        {
            echo "error, no se pudo editar cisterna";
        }
            
        
        break;
    }
}
    if (isset($_GET['action'])) {
        $cisternaController = new CisternaController();
        require_once('../model/Cisterna.php'); 
        switch ($_GET['action']){
            case ('index'):
                //exit('hola');
                 $cisternaController->index();
            break;

        case ('eliminar'):
        if (!empty($_GET['id'])) {   
            $cisternaController->delete(Cisterna::findById($_GET['id'])); 
            echo 'cisterna eliminada';
        }   
        break;
        }
    }
    
    //?action=index
?>