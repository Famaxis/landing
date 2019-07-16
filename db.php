<?php 

$db = new PDO('mysql:host=localhost;dbname=landing', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

session_start();
