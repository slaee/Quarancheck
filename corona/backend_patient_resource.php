<?php

require_once 'importance.php';


$query = Db::fetch("resources", "", "number = ?", $_SESSION['patient'], "", "", "");

class Group
{
}
class Resource
{
}

$groups = array();

while ($result = Db::assoc($query)) {
    $r = new Resource();
    $r->id = $result['id'];
    $r->name = $result['name'];
    $groups[] = $r;
}


header('Content-Type: application/json');
echo json_encode($groups);
