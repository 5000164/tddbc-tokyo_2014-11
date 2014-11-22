<?php
namespace Tddbc;

class Todo
{
    private $todo_list;

    function __construct()
    {
        $this->todo_list = array();
    }

    public function get_todo_list()
    {
        return $this->todo_list;
    }

    public function add_item()
    {
        $this->todo_list[] = '';

        return $this->todo_list;
    }

    public function read()
    {
        $file = file_get_contents('./todo_list.txt');

        return $file;
    }

}
