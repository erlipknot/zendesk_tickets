<?php session_start(); 
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
print "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php'>";
?>