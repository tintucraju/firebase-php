# firebase-php

A simple php snippet for push message to firebase 


```php
	require 'firebase_lib.php';
	// create new object for Firebase class 
	$ob = new Firebase();

	// configurate the device by invoking setDevice method with token as argument 
	$ob->setDevice("-- device token --");

	// build the message array 
	$msg = array
	(
	    'body'   => 'Message body',
	    'title'     => 'Message title',
	    'custome_key'  => 'custom_value'
	);

	// call the push method to send notification 
	$res = $ob->push($msg);
	var_dump($res);
```
