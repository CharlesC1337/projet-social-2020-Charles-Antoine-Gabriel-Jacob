<?php
namespace GGChat;

session_start();

require_once('includes/dbh.inc.php');
require_once('classe/Page.php');//pour la classe page
require_once('classe/checker/Login.php');//pour le login 
require_once('classe/checker/Logout.php');//pour le lougout
require_once('classe/view/Membre.php');//pour membre

require_once('classe/dao/ProfilePicDao.php');//pour form Checker
require_once('classe/dao/RenameDao.php');//pour form Checker
require_once('classe/dao/AddGroupDAO.php');//pour form Checker

use GGChat\classe\pageBasic\Page as Page;
use GGChat\classe\checker\Login as Login;
use GGChat\classe\checker\Logout as Logout;
use GGChat\classe\view\Membre as Membre;

use GGChat\classe\dao\ProfilePicDAO as ProfilePic;
use GGChat\classe\dao\RenameDAO as Rename;
use GGChat\classe\dao\AddGroupDAO as AddGroup;

$LoginTopNav = new Login();//création login

$LoginTopNav->check();//check pour le login submit

$LogoutTopNav = new Logout();//création login

$LogoutTopNav->check();//check pour le logout submit

//------------------------form-membre----------------------------//

$RenameChecker = new Rename();

$RenameChecker->check();

$ProfilePicChecker = new ProfilePic();

$ProfilePicChecker->check();

$AddGroupChecker = new AddGroup();

$AddGroupChecker->check();

//--------------------------membre--------------------------------//

$PageMembrePrincipal = new Membre(); 

$PageMembrePrincipal->htmlHead();

$PageMembrePrincipal->htmlTopNav('membre.php');

$PageMembrePrincipal->formulaire();

$PageMembrePrincipal->Htmlclose();

$PageMembrePrincipal->affiche($PageMembrePrincipal->doc);
?>