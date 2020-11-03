<?php


namespace App\model;


use PDO;

class UserModel
{
    protected $dataBase;

    public function __construct()
    {
        $db = new DBConnect();
        $this->dataBase = $db->connect();
    }

    public function getData()
    {
        $stmt = $this->dataBase->prepare("SELECT * FROM users");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = [];
        foreach ($result as $item) {
            $user = new User($item['name'], $item['age'], $item['address']);
            $user->id = $item['id'];
            $users[] = $user;
        }
        return $users;
    }

    public function getById($_id)
    {
        $stmt = $this->dataBase->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
        $result = $stmt->fetch();
        $user = new  User($result['name'], $result['age'], $result['address']);
        $user->setId($result['id']);
        return $user;
    }

    public function addData($user)
    {
        $query = "INSERT INTO users (name,age,address) VALUES (:name,:age,:address)";
        $stmt = $this->dataBase->prepare($query);
        $stmt->bindParam(':name', $user->getName());
        $stmt->bindParam(':age', $user->getAge());
        $stmt->bindParam(':address', $user->getAddress());
        $stmt->execute();
    }

    public function update($user, $_id)
    {
        $query = "UPDATE users SET name =:name,age=:age,address=:address WHERE id=:id";
        $stmt = $this->dataBase->prepare($query);
        $stmt->bindParam(':name', $user->getName());
        $stmt->bindParam(':age', $user->getAge());
        $stmt->bindParam(':address', $user->getAddress());
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
    }

    public function delete($_id)
    {
        $query = "DELETE FROM users WHERE id=:id";
        $stmt = $this->dataBase->prepare($query);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();
    }
}