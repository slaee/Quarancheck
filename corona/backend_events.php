<?php
require_once '_db.php';

$stmt = $db->prepare('SELECT * FROM events WHERE NOT ((end <= :start) OR (start >= :end))');
$stmt->bindParam(':start', $_GET['start']);
$stmt->bindParam(':end', $_GET['end']);
$stmt->execute();
$result = $stmt->fetchAll();

class Event
{
}
$events = array();

foreach ($result as $row) {
	$e = new Event();
	$e->id = $row['id'];
	$e->text = $row['name'];
	$e->start = $row['start'];
	$e->token = $row['token'];
	$e->number = $row['number'];
	$e->end = $row['end'];
	$e->resource = $row['resource_id'];
	$e->bubbleHtml = "Event details:  " . $e->text . "<br>". "Id Number:  " . $e->number;
	$events[] = $e;
}

header('Content-Type: application/json');
echo json_encode($events);
