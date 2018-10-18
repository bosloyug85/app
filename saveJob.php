<?php 

	session_start();
	require_once __DIR__ . "/classes/User.php";

	$taskID = $_POST['task_id'];

	switch ($_POST['kind']) {
		case 'man':
			$cat = 'man';
			break;
		case 'pics':
			$cat = 'pics';
			break;
		case 'videos':
			$cat = 'videos';
			break;
	}

	$userID = $_POST['user_id'];
	$userName = $_POST['user_name'];
	$taskTitle = $_POST['task_title'];
	$taskText = $_POST['task_text'];
	$taskText1 = $_POST['task_text1'];
	$taskBudget = $_POST['task_budget'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$lat = $_POST['lat'];
	$long = $_POST['long'];
	$subkind = $_POST['subkind'];
	$timestamp = time();



	$task = new Tasks();
	$task->createTask($taskID, $userID, $userName, $taskTitle, $taskText, $taskText1, $taskBudget, $cat, $timestamp, $lat, $long, $subkind, $city, $country);

	echo "created";


?>