<?php

if(!isset($_SESSION)) {
    session_start();
}
// destroi a sessao e o id
session_destroy();
// redireciona ao login
header("Location: http://localhost/BicoJobs/templates/index.php");

?>