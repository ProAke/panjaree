<?php

require_once 'config.php';

class Database extends Config {
// à¾ÔèÁãËÁè User Into Database
public function insert($fname, $lname, $email, $phone) {
$tdate=date("Y-m-d");
$sql = 'INSERT INTO express (tdate, first_name, last_name, email, phone) VALUES (:tdate, :fname, :lname, :email, :phone)';
$stmt = $this->conn->prepare($sql);
$stmt->execute([
'tdate' => $tdate,
'fname' => $fname,
'lname' => $lname,
'email' => $email,
'phone' => $phone
]);
return true;
}

// Fetch ÍèÒ¹¢éÍÁÙÅ express From Database
public function read() {
$sql = 'SELECT * FROM express ORDER BY id DESC';
$stmt = $this->conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
return $result;
}

// Fetch Single User From Database
public function readOne($id) {
$sql = 'SELECT * FROM express WHERE id = :id';
$stmt = $this->conn->prepare($sql);
$stmt->execute(['id' => $id]);
$result = $stmt->fetch();
return $result;
}

// Update Single User
public function update($id, $fname, $lname, $email, $phone) {
$sql = 'UPDATE express SET first_name = :fname, last_name = :lname, email = :email, phone = :phone WHERE id = :id';
$stmt = $this->conn->prepare($sql);
$stmt->execute([
'fname' => $fname,
'lname' => $lname,
'email' => $email,
'phone' => $phone,
'id' => $id
]);

return true;
}

// Delete User From Database
public function delete($id) {
$sql = 'DELETE FROM express WHERE id = :id';
$stmt = $this->conn->prepare($sql);
$stmt->execute(['id' => $id]);
return true;
}
}
