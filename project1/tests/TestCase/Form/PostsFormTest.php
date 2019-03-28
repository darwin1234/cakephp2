<?php
namespace App\Test\TestCase\Form;

use App\Form\PostsForm;
use Cake\TestSuite\TestCase;

/**
 * App\Form\PostsForm Test Case
 */
class PostsFormTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Form\PostsForm
     */
    public $Posts;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Posts = new PostsForm();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Posts);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
