
            <?php
class CisternaController {
    
    public function __construct() {}
    
    public function index($error) {
        require_once('../model/Cisterna.php');
        $cisternas = Cisterna::findAll();
        require_once('../view/viewCisternaIndex.php');
    }

    public function register() {
        require_once('../view/viewRegisterCisterna.php');
    }

    public function insert($cisterna) {
        require_once('../model/Cisterna.php');
        if (strpos($cisterna->insert(), 'Error') === 0) {
            header('Location: controllerCisterna.php?action=register&error='.$cisterna->getIDCisterna());
        } else {
            header('Location: controllerCisterna.php?action=index');
        }
    }

    public function viewUpdate($id) {
        require_once('../model/Cisterna.php');
        $cisterna = Cisterna::findById($id);
        require_once('../view/viewUpdateCisterna.php');
    }

    public function update($cisterna) {
        require_once('../model/Cisterna.php');
        $cisterna->update();
        $this->index();
    }

    public function delete($cisterna) {
        require_once('../model/Cisterna.php');
        if (strpos($cisterna->delete(), 'Error') === 0) {
            header('Location: controllerCisterna.php?action=index&error='.$cisterna->getIDCisterna());
        } else {
            header('Location: controllerCisterna.php?action=index');
        }
    }
}

if (isset($_POST['action'])) {
    $cisternaController = new CisternaController();
    require_once('../model/Cisterna.php');
    switch ($_POST['action']) {
        case ('new'): 
            if (!empty($_POST['TotalLitros']) && !empty($_POST['NombreCisterna'])){
            $cisterna = new Cisterna('NULL', $_POST['TotalLitros'], $_POST['NombreCisterna']);
            $cisternaController->insert($cisterna);
            } else {
                echo "Campos incompletos.";
            }
        break;
        case ('update'):
            if (!empty($_POST['id']) && !empty($_POST['TotalLitros']) && !empty($_POST['NombreCisterna'])){
            $cisterna = new Cisterna($_POST['id'], $_POST['TotalLitros'], $_POST['NombreCisterna']);
            $cisternaController->update($cisterna);
            } else {
                echo "Campos incompletos.";
            }
        break;
    }
}

if (isset($_GET['action'])) {
    $cisternaController = new CisternaController();
    require_once('../model/Cisterna.php');
    switch ($_GET['action']) {
        case ('index'):
            $error = null;
            if (!empty($_GET['error'])) {
                $error = $_GET['error'];
            }
            $cisternaController->index($error);
            break;
            case ('register'):
            $error = null;
            if (!empty($_GET['error'])) {
                $error = $_GET['error'];
            }
            $cisternaController->register($error);
        break;
        case ('update'):
            if (!empty($_GET['id'])){
            $cisternaController->viewUpdate($_GET['id']);
            } else {
                echo "Campos incompletos.";
            }
        break;
        case ('delete'):
            if (!empty($_GET['id'])) {
                $cisternaController->delete(Cisterna::findById($_GET['id']));
            } else {
                echo "Campos incompletos.";
            }
        break;
    }
}
?>