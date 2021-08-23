<?php


namespace Beejee\Controllers;


class TasksController extends AbstractController
{
    private $adminPrefix = "";

    public function postTask()
    {
        $text = $_POST['text'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $this->model->insertData($text, $name, $email);
        $_SESSION['isCreated'] = 1;
        header('Location: /');
    }

    public function updateTask()
    {
        $isDone = $_POST['isDone'];
        $text = $_POST['text'];
        $id = $_POST['rowId'];
        $this->model->updateData($id, $text, $isDone);
        header('Location: /');
    }

    public function login(){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $configuration = parse_ini_file(dirname(__FILE__).'/../adminsettings.ini');
        if($login == $configuration['login'] && $password == $configuration['password'])
        {
            $_SESSION['isAdmin'] = 1;
        }
        header('Location: /');
    }

    public function logout()
    {
        $_SESSION['isAdmin'] = 0;
        header('Location: /');
    }

    private function isAdmin()
    {
        if($_SESSION['isAdmin'] == 1)
        {
            $this->adminPrefix = "Admin";
        }
    }

    public function render()
    {
        $this->isAdmin();
        $decorator = \Beejee\Decorators\AbstractDecorator::create($this->name.$this->adminPrefix, $this->model);
        $view = \Beejee\Views\AbstractView::create($this->name, $decorator);
        return $view->render();
    }
}
