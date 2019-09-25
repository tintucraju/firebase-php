<?php 
	
	require 'firebase_lib.php';
	// create new object for Firebase class 
	$ob = new Firebase();

	// configurate the device by invoking setDevice method with token as argument 
	$ob->setDevice("--device token here--");

	// build the message array 
	$msg = array
	(
	    'body'   => 'Your account created successfully.',
	    'title'     => 'Account Created',
	    'key1'  => 'val1'
	);

	// call the push method to send notification 
	$res = $ob->push($msg);
	var_dump($res);

?>