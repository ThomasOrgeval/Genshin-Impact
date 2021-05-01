<?php

session_start();
require __DIR__ . '/../../model/db.php';

clearQueue($_SESSION['Account']['mail']);