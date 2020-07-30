<?php

unset($_SESSION['status']);
session_destroy();
header('Location: http://localhost/jeanforteroche/index.php');

?>