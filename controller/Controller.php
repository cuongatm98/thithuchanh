<?php

namespace Controller;

use Model\Customer;
use Model\CustomerDB;
use Model\DBConnection;

class Controller
{

    public CustomerDB $customerDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=thuchanhm2", "root", "123");
        $this->customerDB = new CustomerDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/add.php';
        } else {

            // Validate dữ liệu
            $errors = [];
            $fields = ['tenhang', 'loaihang'];

            foreach ($fields as $field) {
                if (empty($_POST[$field])) {
                    $errors[$field] = 'Không được để trống';
                }
            }

            if (empty($errors)) {
                $tenhang = $_POST['tenhang'];
                $loaihang = $_POST['loaihang'];
                $sanpham = new Customer($tenhang, $loaihang);
                $this->customerDB->create($sanpham);
                header('Location: index.php');
            } else {
                include 'view/add.php';
            }
        }
    }
    public function index()
    {
        $sanpham = $this->customerDB->getAll();
        include 'view/list.php';
    }
    public function delete()
    {
        $masp = $_GET['masp'];
        $this->customerDB->delete($masp);
        header('Location: index.php');
    }
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $masp = $_GET['masp'];
            $sanpham = $this->customerDB->get($masp);
            include 'view/edit.php';
        } else {

            // Validate dữ liệu
            $errors = [];
            $fields = ['tenhang', 'loaihang'];

            foreach ($fields as $field) {
                if (empty($_POST[$field])) {
                    $errors[$field] = 'Không được để trống';
                }
            }

            $masp = $_POST['masp'];
            if (empty($errors)) {
                $sanpham = new Customer($_POST['tenhang'], $_POST['loaihang']);
                $this->customerDB->update($masp, $sanpham);
                header('Location: index.php');
            } else {
                $sanpham = $this->customerDB->get($masp);
                include 'view/edit.php';
            }
        }
    }
}