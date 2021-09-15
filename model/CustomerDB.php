<?php

namespace Model;

class CustomerDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }
//
    public function getAll(): array
    {
        $sql = "SELECT * FROM sanpham";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        $sanphams = [];
        foreach ($result as $row) {
            $sanpham = new Customer($row['tenhang'], $row['loaihang']);
            $sanpham->masp = $row['masp'];
            $sanphams[] = $sanpham;
        }
        return $sanphams;
    }
    public function delete($masp)
    {
        $sql = "DELETE FROM sanpham WHERE masp = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $masp);
        return $statement->execute();
    }
    public function create(object $sanpham)
    {
        $sql = 'INSERT INTO sanpham(tenhang,loaihang) VALUES (?, ?)';
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $sanpham->tenhang);
        $statement->bindParam(2, $sanpham->loaihang);
        return $statement->execute();
    }
    public function get($masp)
    {
        $sql = "SELECT * FROM sanpham WHERE masp=$masp";
        $statement = $this->connection->query($sql);
        return $statement->fetchObject();
    }
    public function update($masp, $sanpham)
    {
        $sql = "UPDATE sanpham SET tenhang = ?, loaihang = ? WHERE masp = ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindParam(1, $sanpham->tenhang);
        $statement->bindParam(2, $sanpham->loaihang);
        $statement->bindParam(3, $masp);
        return $statement->execute();
    }
}
