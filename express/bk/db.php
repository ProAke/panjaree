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
    public function read($tday)
    {
        if($tday != ""){
            $sql = 'SELECT * FROM tb_DailyExpress WHERE tdate='".$tday."' ORDER BY tdate DESC';
        }else{
        $sql = 'SELECT * FROM tb_DailyExpress ORDER BY tdate DESC';    
        }
        
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
    public function update($id, $tdate, $rname, $rphone, $sname, $sphone, $code, $provider, $cod, $wallet)
    {
        //$sql = 'UPDATE tb_DailyExpress SET rname = :rname WHERE id = :id';
        //$stmt = $this->conn->prepare($sql);
        //$stmt->execute(['rname' => $rname]);
        $sql = "UPDATE tb_DailyExpress SET `rname`= '" . $rname . "',
         `rphone`= '" . $rphone . "',
         `sname`= '" . $sname . "',
         `rphone`= '" . $rphone . "',
         `code`= '" . $code . "',
         `cod`= '" . $cod . "',
         `wallet`= '" . $wallet . "'         
          WHERE `id`='" . $id . "'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'rname' => $rname,
            'rphone' => $rphone,
            'sname' => $sname,
            'sphone' => $sphone,
            'code' => $code,
            'provider' => $provider,
            'cod' => $cod,
            'wallet' => $wallet
        ]);

        return true;
    }

    // Delete User From Database
    public function delete($id)
    {
        $sql = 'DELETE FROM tb_DailyExpress WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }
}
