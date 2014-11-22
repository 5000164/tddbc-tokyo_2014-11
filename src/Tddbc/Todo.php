<?php
namespace Tddbc;

class Todo
{
    private $todo_list;
    private $id;

    function __construct()
    {
        $this->id = 0;
        $json = $this->read();
        $this->todo_list = json_decode($json, true);
    }

    public function get_todo_list()
    {
        return $this->todo_list;
    }

    public function get_item($key)
    {
        return $this->todo_list[$key];
    }

    public function add_item($item)
    {
        $item['id'] = $this->id;
        $this->todo_list[$this->id] = $item;
        $this->id++;
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
