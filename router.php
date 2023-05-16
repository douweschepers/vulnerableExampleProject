<?php

require_once './queryCreator.php';
require_once './Team.php'; 
require_once './TeamController.php'; 

// route for Team
if (preg_match('/(Team)/', $_SERVER["REQUEST_URI"])) {
    $controller = new TeamController();
    $result = $controller->getTeam();
    echo "<p>$result</p>";    // serve the requested resource as-is.
}
// Random route
if (preg_match('/(random)/', $_SERVER["REQUEST_URI"])) {
    $controller = new TeamController();
    $result = $controller->getRandom0();
    echo "<p>$result</p>";    // serve the requested resource as-is.
} else {
    echo "<p>Non existing path</p>";
}