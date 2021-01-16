<?php
require_once '_db.php';
require_once 'importance.php';

$json = file_get_contents('php://input');
$params = json_decode($json);

$query = Db::fetch("resources", "", "id = ?", $params->resource, "", "", "");

$data = Db::assoc($query);

$stmt = $db->prepare("INSERT INTO events (name, token, number, start, end, resource_id) VALUES (:name, :token, :number, :start, :end, :resource)");
$stmt->bindParam(':start', $params->start);
$stmt->bindParam(':end', $params->end);
$stmt->bindParam(':name', $params->text);
$stmt->bindParam(':token', $data['token']);
$stmt->bindParam(':number', $data['number']);
$stmt->bindParam(':resource', $params->resource);
$stmt->execute();

class Result {}

$response = new Result();
$response->result = 'OK';
$response->message = 'Created with id: '.$db->lastInsertId();
$response->id = $db->lastInsertId();

header('Content-Type: application/json');
echo json_encode($response);
