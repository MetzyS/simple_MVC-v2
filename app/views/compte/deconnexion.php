<?php
session_start();
unset($_SESSION['utilisateur']);
header('Location: /www/simple_MVC-v2/public/home/index/');
