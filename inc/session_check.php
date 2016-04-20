<?PHP
    require_once("Mapper/Dozent.php");

    session_start();
    if ($_SESSION ["login"]<>"1") {
            $_SESSION = array();
            session_destroy();
            header('Location: login.php');
    } else {
        $dozent = $_SESSION ["dozent"];
    }

?>
