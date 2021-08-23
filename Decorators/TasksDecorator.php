<?php


namespace Beejee\Decorators;


class TasksDecorator extends AbstractDecorator
{
    public $tasks;

    public function __construct($tasks)
    {
        $this->tasks = $tasks;
    }

    public function title()
    {
        return 'Задачи';
    }

    public function navbar()
    {
        return '
        <nav class="navbar navbar-light bg-light justify-content-between">
                <a class="navbar-brand">Задачи</a>
                <form class="form-inline" action="tasks/login" method="post">
                <input class="form-control mr-sm-2" type="text" placeholder="Логин" name="login">
                <input class="form-control mr-sm-2" type="password" placeholder="Пароль" name="password">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Войти</button>
            </form>
        </nav>';
    }

    private function tableHeaderRender()
    {
        return "<thead>
                <tr>
                    <th>{$this->tasks->name}</th>
                    <th>{$this->tasks->email}</th>
                    <th>{$this->tasks->text}</th>
                    <th>{$this->tasks->isDone}</th>
                </tr>
                </thead>";
    }

    private function rowRender($row)
    {
        $doneClass = $row['isDone'] ? 'bg-success' : '';
        $isChecked = $row['isDone'] ? "выполнено" : 'не выполнено';
        return "<tr class='{$doneClass}'>
                    <td>{$row["name"]}</td>
                    <td>{$row["email"]}</td>
                    <td>{$row["text"]}</td>
                    <td>{$isChecked}</td>
                </tr>";
    }

    public function body()
    {
        $tableBody = '<table id="tasks" class="table table-striped table-bordered">';
        $tableBody .= $this->tableHeaderRender();
        foreach ($this->tasks->getData() as $task)
        {
            $tableBody .= $this->rowRender($task);
        }
        return $tableBody . '</table>';
    }
}