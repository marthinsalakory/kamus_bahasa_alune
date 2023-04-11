<?php

include 'function.php';
unset($_SESSION['kbai_login']);
session_destroy();
redirect_back();
