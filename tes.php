<?php

$str = "saya mau makan, makanannya kamu";
$pattern = "/\bmakan\b/";
$replacement = "ane";
echo preg_replace($pattern, $replacement, $str);
