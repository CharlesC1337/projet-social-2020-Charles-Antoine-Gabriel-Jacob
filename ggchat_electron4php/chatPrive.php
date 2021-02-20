<?php
namespace GGChat;

session_start();

require_once('includes/dbh.inc.php');
require_once('classe/Page.php');//pour la classe page
require_once('classe/checker/Login.php');//pour le login 
require_once('classe/checker/Logout.php');//pour le lougout
require_once('classe/view/ChatPrive.php');//pour chat
require_once('classe/dao/ChatPriveDAO.php');

use GGChat\classe\Page as Page;
use GGChat\classe\checker\Login as Login;
use GGChat\classe\checker\Logout as Logout;
use GGChat\classe\ChatPrive as ChatPrive;

$LoginTopNav = new Login();//création login

$LoginTopNav->check();//check pour le login submit

$LogoutTopNav = new Logout();//création login

$LogoutTopNav->check();//check pour le logout submit

//--------------------------computer--------------------------------//

$PageChatPrincipal = new ChatPrive(); 

$PageChatPrincipal->chatCheck();

$PageChatPrincipal->htmlHead($PageChatPrincipal->title);

$PageChatPrincipal->htmlTopNav('chatPrive.php');

$PageChatPrincipal->chatPrint();

$PageChatPrincipal->chatInput();

$PageChatPrincipal->Htmlclose();

$PageChatPrincipal->affiche($PageChatPrincipal->doc)
?>