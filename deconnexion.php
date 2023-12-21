<?php
    require_once 'include/include.php';
    // If the user is not logged in, logging out has no effect!
    if (Utilisateur::utilisateurConnecte()) {
        session_unset();
    }
    Application::redir('login/');
?>

