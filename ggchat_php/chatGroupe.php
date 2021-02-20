<?php
namespace GGChat;

session_start();

require_once('includes/dbh.inc.php');
require_once('classe/Page.php');//pour la classe page
require_once('classe/checker/Login.php');//pour le login 
require_once('classe/checker/Logout.php');//pour le lougout
require_once('classe/view/ChatGroupe.php');//pour chat
require_once('classe/dao/ChatGroupeDAO.php');//pour chat

use GGChat\classe\Page as Page;
use GGChat\classe\checker\Login as Login;
use GGChat\classe\checker\Logout as Logout;
use GGChat\classe\ChatGroupe as ChatGroupe;

$LoginTopNav = new Login();//création login

$LoginTopNav->check();//check pour le login submit

$LogoutTopNav = new Logout();//création login

$LogoutTopNav->check();//check pour le logout submit

//--------------------------group chat--------------------------------//

$PageChatPrincipal = new ChatGroupe(); 

$PageChatPrincipal->htmlHead($PageChatPrincipal->title);

$PageChatPrincipal->htmlTopNav('chat.php');

$PageChatPrincipal->groupChatPrint();

$PageChatPrincipal->Htmlclose();

$PageChatPrincipal->affiche($PageChatPrincipal->doc)
?>