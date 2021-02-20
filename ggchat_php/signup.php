<?php
namespace GGChat;

session_start();

require_once ('includes/dbh.inc.php');
require_once('classe/Page.php');//pour la classe page
require_once('classe/checker/Login.php');//pour le login 
require_once('classe/checker/Logout.php');//pour le lougout
require_once('classe/view/SignUp.php');//pour computer

use GGChat\classe\Page as Page;
use GGChat\classe\checker\Login as Login;
use GGChat\classe\checker\Logout as Logout;
use GGChat\classe\view\Signup as Signup;

$LoginTopNav = new Login();//création login

$LoginTopNav->check();//check pour le login submit

$LogoutTopNav = new Logout();//création login

$LogoutTopNav->check();//check pour le logout submit

//--------------------------signUp--------------------------------//

$PageSignUpPrincipal = new Signup(); 

$PageSignUpPrincipal->signCheck();

$PageSignUpPrincipal->htmlHead($PageSignUpPrincipal->title);

$PageSignUpPrincipal->htmlTopNav('signup.php');

$PageSignUpPrincipal->signUpHtml();

$PageSignUpPrincipal->Htmlclose();

$PageSignUpPrincipal->affiche($PageSignUpPrincipal->doc);
?>