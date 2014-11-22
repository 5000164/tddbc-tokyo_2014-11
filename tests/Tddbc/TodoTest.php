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
        $this->sut->add_item();
        $this->assertEquals(1, count($this->sut->get_todo_list()));
    }

    /**
     * @test
     */
    public function todo_listファイルの中身がa()
    {
        $this->assertEquals('a', $this->sut->read());
    }

}
