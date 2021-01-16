<?php
require_once '_db.php';
require_once 'importance.php';

$json = file_get_contents('php://input');
$params = json_decode($json);

$query = Db::fetch("resources", "", "id = ?", $params->newResource, "", "", "");
$data = Db::assoc($query);

$stmt = $db->prepare("UPDATE events SET  token = :token, number = :number, start = :start, end = :end, resource_id = :resource WHERE id = :id");
$stmt->bindParam(':id', $params->id);
$stmt->bindParam(':start', $params->newStart);
$stmt->bindParam(':end', $params->newEnd);
$stmt->bindParam(':token', $data['token']);
$stmt->bindParam(':number', $data['number']);
$stmt->bindParam(':resource', $params->newResource);
$stmt->execute();

class Result {}

$response = new Result();
$response->result = 'OK';
$response->message = 'Update successful';

header('Content-Type: application/json');
echo json_encode($response);
