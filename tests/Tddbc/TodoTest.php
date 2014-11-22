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
     * test
     */
    public function todo_listファイルの0番目の内容が1()
    {
        $this->assertEquals('1', $this->sut->get_todo_item(0));
    }

    /**
     * @test
     */
    public function 追加したアイテムのaが取得できるか()
    {
        $this->sut->add_item('a');
        $itemList = $this->sut->get_todo_list();
        $this->assertEquals('a', $itemList[0]);
    }

    /**
     * @test
     */
    public function 追加したアイテムのbが取得できるか()
    {
        $this->sut->add_item('b');
        $itemList = $this->sut->get_todo_list();
        $this->assertEquals('b', $itemList[0]);
    }


}
