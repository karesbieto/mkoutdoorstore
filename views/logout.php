<?php

//destroy and uset the session
session_start();
session_unset();
session_destroy();

//return back to the landing page
header('Location: ../views/home.php');
?>