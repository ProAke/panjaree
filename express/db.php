<?php

require_once 'config.php';

class Database extends Config
{
    //User Into Database
    public function insert($tdate, $rname, $rphone, $sname, $sphone, $code, $provider)
    {
        //$tdate = date("Y-m-d");
        $sql = 'INSERT INTO tb_DailyExpress (tdate, rname, rphone, sname, sphone, code, provider) 
        VALUES (:tdate, :rname, :rphone, :sname, :sphone, :code, :provider)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'tdate' => $tdate,
            'rname' => $rname,
            'rphone' => $rphone,
            'sname' => $sname,
            'sphone' => $sphone,
            'code' => $code,
            'provider' => $provider
        ]);
        return true;
    }


    /*
id
tdate
rname
rphone
sname
sphone
code
provider
cod
wallet
state
status



*/


    // Fetch ��ҹ������ tb_DailyExpress From Database
    public function read()
    {
        $sql = 'SELECT * FROM tb_DailyExpress ORDER BY tdate DESC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // Fetch Single User From Database
    public function readOne($id)
    {
        $sql = 'SELECT * FROM tb_DailyExpress WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;
    }

    // Update Single User
    public function update($id, $fname, $lname, $email, $phone)
    {
        $sql = 'UPDATE tb_dailyexpress SET first_name = :fname, last_name = :lname, email = :email, phone = :phone WHERE id = :id';
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
    public function delete($id)
    {
        $sql = 'DELETE FROM tb_dailyexpress WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }
}
