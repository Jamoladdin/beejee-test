<?php
namespace Beejee\Views;

class TasksView extends AbstractView
{
    const TEMPLATE = '
<!DOCTYPE html>
<html lang="ru">
    <head>
    <title>{{title}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <meta charset="utf-8"> 
</head>
    <body>
        {{navbar}}
        <div class="container my-5">
            {{body}}
            <h2 class="my-3">Новая задача</h2>
            <form method="post" action="tasks/postTask">
                <div class="d-flex">
                    <input type="text" name="name" required class="form-control mr-1" maxlength="32" placeholder="Имя">
                    <input type="email" name="email" required class="form-control ml-1" maxlength="32" placeholder="Почта">
                </div>
                <div class="flex-row my-2">
                    <input type="text" required name="text" class="form-control" maxlength="255" placeholder="Описание задачи...">
                </div>
                <input type="submit" class="btn btn-primary" value="Создать">
            </form>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="js/data-tables.js">
    
</script>
</html>';

    protected $templateReplacements;

    public function __construct($decorator)
    {
        $this->templateReplacements = [
            '{{title}}' => $decorator->title(),
            '{{body}}' => $decorator->body(),
            '{{navbar}}' => $decorator->navbar()];
    }

    public function render()
    {
        return str_replace(
            array_keys($this->templateReplacements),
            array_values($this->templateReplacements),
            $this::TEMPLATE);
    }
}