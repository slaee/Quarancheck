<?php
// require_once '_db.php';

// $scheduler_groups = $db->query('SELECT * FROM groups ORDER BY name');

require_once 'importance.php';

$query = Db::fetch("resources", "", "token = ?", $_SESSION['patient'], "", "", "");

class Group
{
}
class Resource
{
}
$groups = array();
$r = new Resource();
while ($result = Db::assoc($query)) {
    $r->id = $result['id'];
    $r->name = $result['name'];
    $groups[] = $r;
}





// foreach ($scheduler_groups as $group) {
// 	$g = new Group();
// 	$g->id = "group_" . $group['id'];
// 	$g->name = $group['name'];
// 	$g->expanded = true;
// 	$g->children = array();s
// 	

//     // $stmt = $db->prepare('SELECT * FROM resources WHERE group_id = :group ORDER BY name');
//     // $stmt = $db->prepare('SELECT * FROM resources WHERE token = ORDER BY name');



// 	$stmt->bindParam(':group', $group['id']);
// 	$stmt->execute();
// 	$scheduler_resources = $stmt->fetchAll();

// 	foreach ($scheduler_resources as $resource) {
// 		$r = new Resource();
// 		$r->id = $resource['id'];
// 		$r->name = $resource['name'];
// 		$g->children[] = $r;
// 	}
// }



header('Content-Type: application/json');
echo json_encode($groups);
