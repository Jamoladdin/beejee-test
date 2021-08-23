<?php
namespace Beejee\Models;

class TasksModel extends AbstractModel
{
    public $name = 'Имя пользователя';
    public $text = 'Описание задачи';
    public $email = 'Почта';
    public $isDone = 'Выполнено';


    function getData()
    {
        return $this->db->query('SELECT * FROM tasks')->fetchAll();
    }

    function insertData($text, $name="Anonim", $email=null)
    {
//        echo $text.' '.$name.' '.$email;
//        die();
        $statement = $this->db->prepare('INSERT INTO tasks (name, email, text) VALUES (?,?,?)');

        return $statement->execute([$name,$email,$text]);
    }

    function updateData($id, $text, $isDone)
    {
        $statement = $this->db->prepare('UPDATE tasks SET text=?, isDone=? WHERE id=?');
        return $statement->execute([$text,$isDone,$id]);
    }
}