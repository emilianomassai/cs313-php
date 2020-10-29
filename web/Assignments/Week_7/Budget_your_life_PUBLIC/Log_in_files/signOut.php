<?php
/**********************************************************
 * File: signOut.php
 * Author: Br. Burton
 *
 * Description: Clears the username from the session if there.
 *
 ***********************************************************/

session_start();
unset($_SESSION['username']);

header("Location: signIn.php");
die(); // we always include a die after redirects.