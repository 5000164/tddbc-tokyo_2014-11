<?php
namespace Tddbc;

class Todo
{
    private $todo_list;

    function __construct()
    {
        $json = $this->read();
        $this->todo_list = json_decode($json, true);
    }

    public function get_todo_list()
    {
        return $this->todo_list;
    }

    public function add_item($item)
    {
        $this->todo_list[] = $item;

        return $this->todo_list;
    }

    public function delete_item()
    {
        $index = count($this->todo_list) - 1;
        unset($this->todo_list[$index]);
    }

    public function read()
    {
        $file = file_get_contents('./todo_list.json');

        return $file;
    }

    public function get_todo_item($index)
    {
        return $this->todo_list[$index];
    }

}
