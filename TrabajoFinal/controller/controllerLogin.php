<?php 
// require ('../utils/conexion.php');
session_start();
class LoginController
{	
    public function __construct(){}

    /**
     * Visualiza el Panel de control
     */
    public function index(){
        
        require_once('../view/viewPanelDeControl.php');

    }
    public function rebote(){
        //session_start();
        require_once('../view/viewLogin.php');

    }
}
    switch ($_GET["action"]){
        case ('login'):
            $loginController = new LoginController();
            if (!empty($_POST['Contrasena']) && !empty($_POST['Usuario'])){
                    require_once('../model/Usuario.php');
                    $usuario = Usuario::findAllWhere("NombreUsuario LIKE '". $_POST['Usuario']. "' AND Contrasena LIKE '". $_POST['Contrasena']."'");
                    if($usuario){
                        $_SESSION["IDUsuario"] = $usuario[0]->getIDUsuario();
                        $_SESSION["Usuario"] = $usuario[0]->getUsuario();
                        $_SESSION["Contrasena"] =$usuario[0]->getPassword();
                        $loginController->index();
                    }else{
                        echo '<div align="center">El usuario ingresado no existe</div>';
                        $loginController->rebote();
                    }
                //    
                //    
            }else{

                echo '<div align="center">Es necesario que completes los campos</div>';
                 $loginController->rebote();
            }

       
        break;
        case ('logout'):
            unset($_SESSION);
            require_once('../view/viewLogin.php');
            echo '<div align="center">Sesion Cerrada</div>';

            break;
    }
?>