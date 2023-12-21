<?php
    require_once 'include/include.php';
    $title = 'Administration';
    if(!Utilisateur::utilisateurConnecte()):
        Application::alert('You must be logged in to view this page');
        Application::redir('login/');
    endif;
    if(!Utilisateur::getUtilisateurConnecte()->isAdmin()):
        Application::alert('You must be an administrator to view this page');
        Application::redir('other.php');
    endif;
?>
<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo $title; ?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <link rel="stylesheet" type="text/css" href="include/style/cssmenu.css" />
</head>
<body>
    <div id="login_info">
        <span id="nom"><?php echo $_SESSION['first_name'] ?></span>,
        <span id="prenom"><?php echo $_SESSION['last_name'] ?></span>
        <span id="deconnexion"><a href='logout.php'>Logout</a></span>
    </div>
    <div id="main">
        <div id="header">
            <div id="logo">
                <div id="logo_text">
                    <h1>
                        <a href="#"><span class="logo_colour">stock management</span></a>
                    </h1>
                    <h2>July 2014</h2>
                </div>
            </div>
            <?php require 'include/cssmenu_admin.php'; ?>
            <div id="site_content">
            <?php require_once 'include/side_bar.php'; ?>
                <div id="content">
                    <h1>Presentation</h1>
                    <p>web application - stock management - adwya - July 2014</p>
                </div>
            </div>
            <div id="footer">
                <p>
                    <a href="#">ADWYA - July 2014</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>

