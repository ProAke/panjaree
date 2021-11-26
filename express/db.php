<?php

require_once 'config.php';

class Database extends Config
{
    // �������� User Into Database
    public function insert($tdate, $rname, $rphone, $sname, $sphone, $trackcode, $provider, $cod, $wallet, $status)
    {
        $tdate = date("Y-m-d");
        $sql = 'INSERT INTO express (tdate, cs_name, cs_phone, ag_name, ag_phone,track_code, express_provider, COD, wallet, status) 
        VALUES (:tdate, :cs_name, :cs_phone, :ag_name, :ag_phone, :track_code, :express_provider, :cod, :wallet, :status)';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'tdate' => $tdate,
            'cs_name' => $rname,
            'cs_phone' => $rphone,
            'ag_name' => $sname,
            'ag_phone' => $sphone,
            'track_code' => $trackcode,
            'provider' => $provider,
            'COD' => $cod,
            'wallet' => $wallet,
            'status' => $status
        ]);
        return true;
    }


    /*
id
tdate
cs_name
cs_phone
ag_name
ag_phone
track_code
express_provider
COD
WALLET
status


*/


    // Fetch ��ҹ������ express From Database
    public function read()
    {
        $sql = 'SELECT * FROM express ORDER BY id DESC';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    // Fetch Single User From Database
    public function readOne($id)
    {
        $sql = 'SELECT * FROM express WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;
    }

    // Update Single User
    public function update($id, $fname, $lname, $email, $phone)
    {
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
    public function delete($id)
    {
        $sql = 'DELETE FROM express WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }
}
