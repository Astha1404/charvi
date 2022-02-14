<?php
    session_start();
    session_destroy();
    header("Location: /charvi/index.php");
?>