<?php

$con = mysqli_connect('localhost', 'root', '', 'simpleuserlogindb');

if (!$con) {
	die('Connection failed: ' . mysqli_connect_error());
}
