<?php
require_once '_db.php';

$scheduler_groups = $db->query('SELECT * FROM groups ORDER BY name');

// $scheduler_groups = Db::fetch("groups", "", "", "", "name", "", "");

class Group
{
}
class Resource
{
}

$groups = array();

foreach ($scheduler_groups as $group) {
	$g = new Group();
	$g->id = "group_" . $group['id'];
	$g->name = $group['name'];
	$g->expanded = true;
	$g->children = array();
	$groups[] = $g;

	$stmt = $db->prepare('SELECT * FROM resources WHERE group_id = :group ORDER BY name');

	$stmt->bindParam(':group', $group['id']);
	$stmt->execute();
	$scheduler_resources = $stmt->fetchAll();

	foreach ($scheduler_resources as $resource) {
		$r = new Resource();
		$r->id = $resource['id'];
		$r->token = $resource['token'];
		$r->number = $resource['number'];
		$r->name = $resource['name'];
		$g->children[] = $r;
	}
}



header('Content-Type: application/json');
echo json_encode($groups);
