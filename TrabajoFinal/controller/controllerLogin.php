<?php 
// require ('../utils/conexion.php');
session_start();
class LoginController
{	
    public function __construct(){}

    /**
     * Visualiza el Panel de control cuando el login es correcto
     */
    public function index(){
        
        require_once('../view/viewPanelDeControl.php');

    }
    /**
     * Visualiza el login inicial cuando el login es incorrecto o no se ingresaron datos en el formulario
     */
    public function rebote(){
        //session_start();
        require_once('../view/viewLogin.php');

    }
}
    if (isset($_GET["action"])){
        switch ($_GET["action"]){
        // Cuando inicia sesion va a venir por url action=login (GET)
        case ('login'):
            // instanciando la clase loginController para utilizar despues
            $loginController = new LoginController();
            // Preguntamos si cargaron los datos en el formulario
            if (!empty($_POST['Contrasena']) && !empty($_POST['Usuario'])){
                // Si estan cargados entonces buscamos al usuario con los datos del formulario    
                require_once('../model/Usuario.php');
                    $usuario = Usuario::findAllWhere("NombreUsuario LIKE '". $_POST['Usuario']. "' AND Contrasena LIKE '". $_POST['Contrasena']."'");
                   
                    if($usuario){
                        // Si existe el usuario, creamos la session
                        $_SESSION["IDUsuario"] = $usuario[0]->getIDUsuario();
                        $_SESSION["Usuario"] = $usuario[0]->getUsuario();
                        $_SESSION["Contrasena"] =$usuario[0]->getPassword();
                        // y redireccionamos al panel de control
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
            // Cuando cierra sesion viene por url el action=logout (GET)
            unset($_SESSION);
            session_destroy();
            require_once('../view/viewLogin.php');
            echo '<div align="center">Sesion Cerrada</div>';
            break;
    }
    }

  
?>