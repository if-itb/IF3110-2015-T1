<?php

/* Create the application
 */

$app = require_once __DIR__ . '/../bootstrap/app.php';

/* Run the application to get response
 */

$app->run();

/* Send response back to client 
 */ 

$app->send();

