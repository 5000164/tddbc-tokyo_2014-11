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
        $this->sut->add_item($this->create_item(''));
        $this->assertEquals(1, count($this->sut->get_todo_list()));
    }

    /**
     * @test
     */
    public function タイトルがaのアイテムを追加して取得したらリストの最後のアイテムのタイトルがaであるべき()
    {
        $this->sut->add_item($this->create_item('a'));
        $todo_list = $this->sut->get_todo_list();
        $actual = $todo_list[count($todo_list) - 1]['title'];
        $expected = 'a';
        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function タイトルがbのアイテムを追加して取得したらリストの最後のアイテムのタイトルがbであるべき()
    {
        $this->sut->add_item($this->create_item('b'));
        $todo_list = $this->sut->get_todo_list();
        $actual = $todo_list[count($todo_list) - 1]['title'];
        $expected = 'b';
        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function アイテムを2つ追加したらアイテム数が2件であるべき()
    {
        $this->create_todo_list(2);
        $this->assertEquals(2, count($this->sut->get_todo_list()));
    }

    /**
     * @test
     */
    public function アイテムを3つ追加したらアイテム数が3件であるべき()
    {
        $this->create_todo_list(3);
        $this->assertEquals(3, count($this->sut->get_todo_list()));
    }

    /**
     * @test
     */
    public function アイテムを1つ追加して1つ削除してアイテム数が0件であるべき()
    {
        $this->sut->add_item($this->create_item(''));
        $this->sut->delete_item();
        $this->assertEquals(0, count($this->sut->get_todo_list()));
    }

    /**
     * @test
     */
    public function アイテムを2つ追加して1つ削除してアイテム数が1件であるべき()
    {
        $this->add_item(2);
        $this->sut->delete_item();
        $this->assertEquals(1, count($this->sut->get_todo_list()));
    }

    /**
     * @test
     */
    public function アイテムが0件で1つ削除して正常終了するべき()
    {
        $this->sut->delete_item();
        $this->assertNotFalse(true);
    }

    /**
     * @test
     */
    public function アイテムが0件で1つ削除してアイテム数が0件であるべき()
    {
        $this->sut->delete_item();
        $this->assertEquals(0, count($this->sut->get_todo_list()));
    }

    /**
     * @test
     */
    public function アイテムを2つ追加して3つ削除してアイテム数が0件であるべき()
    {
        $this->add_item(2);
        $this->sut->delete_item();
        $this->sut->delete_item();
        $this->sut->delete_item();
        $this->assertEquals(0, count($this->sut->get_todo_list()));
    }

    /**
     * @test
     */
    public function アイテムを2つ追加してキーが0のアイテムが取得できること()
    {
        $id = 0;
        $this->sut->add_item($this->create_item('a'));
        $this->sut->add_item($this->create_item('b'));

        $actual = $this->sut->get_item($id)['id'];
        $expected = '0';

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function アイテムを2つ追加してキーが1のアイテムが取得できること()
    {
        $id = 1;
        $this->sut->add_item($this->create_item('a'));
        $this->sut->add_item($this->create_item('b'));

        $actual = $this->sut->get_item($id)['id'];
        $expected = '1';

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function キーが0でタイトルがaのアイテムを追加してキーが0のアイテムのタイトルがaであるべき()
    {
        $id = 0;
        $this->sut->add_item($this->create_item('a'));
        $this->sut->add_item($this->create_item('b'));

        $actual = $this->sut->get_item($id)['title'];
        $expected = 'a';

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     */
    public function キーが1でタイトルがbのアイテムを追加してキーが1のアイテムのタイトルがbであるべき()
    {
        $id = 1;
        $this->sut->add_item($this->create_item('a'));
        $this->sut->add_item($this->create_item('b'));

        $actual = $this->sut->get_item($id)['title'];
        $expected = 'b';

        $this->assertEquals($expected, $actual);
    }

    private function create_todo_list($item_number)
    {
        $this->sut = new Todo();

        for ($i = 0; $i < $item_number; $i++) {

            $this->sut->add_item($this->create_item(''));
        }
    }

    private function add_item($item_number)
    {
        for ($i = 0; $i < $item_number; $i++) {
            $this->sut->add_item($this->create_item(''));
        }
    }

    private function create_item($title)
    {
        return array('title' => $title);
    }

}
