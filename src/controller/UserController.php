<?php


namespace App\controller;


use App\model\User;
use App\model\UserModel;

class UserController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function show()
    {
        $user = $this->userModel->getData();
        include_once 'src/view/userList.php';
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->userModel->delete($id);
            header('location:index.php');
        }

    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once 'src/view/Add.php';
        } else {
            $name = $_REQUEST['name'];
            $age = $_REQUEST['age'];
            $address = $_REQUEST['address'];
            $user = new User($name, $age, $address);
            $this->userModel->addData($user);
            header('location:index.php');
        }

    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id'];
            $user=$this->userModel->getById($id);
            include_once 'src/view/edit.php';
        } else {
            $id = $_GET['id'];
            $name = $_REQUEST['name'];
            $age = $_REQUEST['age'];
            $address = $_REQUEST['address'];
            $user = new User($name, $age, $address);
            $this->userModel->update($user, $id);
            header('location:index.php');
        }
    }
}