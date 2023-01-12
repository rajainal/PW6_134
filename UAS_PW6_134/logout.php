<?php

session_start();
session_unset();
session_destroy();
// memulai, menghapus, dan menghancurkan sesi

header("Location: login.php");