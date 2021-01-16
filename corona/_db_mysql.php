<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "covid-19";

$db = new PDO(
    "mysql:host=$host;dbname=$database",
    $username,
    $password
);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->exec("CREATE DATABASE IF NOT EXISTS `$database`");
$db->exec("use `$database`");

function tableExists($dbh, $id)
{
    $results = $dbh->query("SHOW TABLES LIKE '$id'");
    if (!$results) {
        return false;
    }
    if ($results->rowCount() > 0) {
        return true;
    }
    return false;
}

$exists = tableExists($db, "resources");

// if ($exists) {

    // group data
    // $items = array(
    //     array('id' => 1, 'name' => 'Positive'),
    //     array('id' => 2, 'name' => 'Negative')
    // );

    // $insert = "INSERT INTO groups (id, name) VALUES (:id, :name)";
    // $stmt = $db->prepare($insert);

    // $stmt->bindParam(':id', $id);
    // $stmt->bindParam(':name', $name);

    // foreach ($items as $item) {
    //     $id = $item['id'];
    //     $name = $item['name'];
    //     $stmt->execute();
    // }

    // resource data
    // $items = array(
    //     array('name' => 'Person 1', 'group_id' => 1),
    //     array('name' => 'Person 2', 'group_id' => 1),
    //     array('name' => 'Person 3', 'group_id' => 1),
    //     array('name' => 'Person 4', 'group_id' => 1),
    //     array('name' => 'Person 1', 'group_id' => 2),
    //     array('name' => 'Person 2', 'group_id' => 2),
    //     array('name' => 'Person 3', 'group_id' => 2),
    //     array('name' => 'person 4', 'group_id' => 2)
    // );

    // $insert = "INSERT INTO resources (name, group_id) VALUES (:name, :group_id)";
    // $stmt = $db->prepare($insert);

    // $stmt->bindParam(':name', $name);
    // $stmt->bindParam(':group_id', $group_id);

    // foreach ($items as $item) {
    //     $name = $item['name'];
    //     $group_id = $item['group_id'];
    //     $stmt->execute();
    // }
// }