<?php
namespace Tddbc;

use Tddbc\Todo;

class TodoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Todo
     */
    private $sut;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->sut = new Todo();
    }

    /**
     * @test
     */
    public function リストがない時に空の配列が返ってくる()
    {
        $this->assertEquals(array(), $this->sut->get_todo_list());
    }

    /**
     * @test
     */
    public function リストのデータが1件ある時にアイテムの数が1件である()
    {
        $this->sut->add_item('aa');
        $this->assertEquals(1, count($this->sut->get_todo_list()));
    }

    /**
     * @test
     */
    public function aを渡したらaが取得できるべき()
    {
        $this->sut->add_item('a');
        $todo_list = $this->sut->get_todo_list();
        $this->assertEquals('a', $todo_list[count($todo_list) - 1]);
    }

    /**
     * @test
     */
    public function bを渡したらbが取得できるべき()
    {
        $this->sut->add_item('b');
        $todo_list = $this->sut->get_todo_list();
        $this->assertEquals('b', $todo_list[count($todo_list) - 1]);
    }

    /**
     * @test
     */
    public function _2つアイテムを追加したらアイテム数が2件であるべき()
    {
        $this->createTodoList(2);
        $this->assertEquals(2, count($this->sut->get_todo_list()));
    }

    /**
     * @test
     */
    public function _3つアイテムを追加したらアイテム数が3件であるべき()
    {
        $this->createTodoList(3);
        $this->assertEquals(3, count($this->sut->get_todo_list()));
    }

    public function createTodoList($item_number)
    {
        $this->sut = new Todo();

        for ($i = 0; $i < $item_number; $i++) {
            $this->sut->add_item('');
        }
    }

    public function addItem($item_number)
    {
        for ($i = 0; $i < $item_number; $i++) {
            $this->sut->add_item('');
        }
    }

}
