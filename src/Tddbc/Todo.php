<?php
namespace Tddbc;

class Todo
{
    private $todo_list = array();

    public function get_todo_list()
    {
        return $this->todo_list;
    }

    public function add_item()
    {
        $this->todo_list[] = "add_item";
        return $this->todo_list;
    }
}
