<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PostsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PostsTable Test Case
 */
class PostsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PostsTable
     */
    public $Posts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Posts',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Posts') ? [] : ['className' => PostsTable::class];
        $this->Posts = TableRegistry::getTableLocator()->get('Posts', $config);
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
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
    public function testCreateSlug()
    {
    $result = $this->Posts->createSlug('Hello World');
    $this->assertEquals('hello-world', $result);
    $result = $this->Posts->createSlug('Hello!, World');
    $this->assertEquals('hello-world', $result);
    $result = $this->Posts->createSlug('Hello   World*$');
    $this->assertEquals('hello-world', $result);
    $result = $this->Posts->createSlug('Hello-   World-');
    $this->assertEquals('hello-world', $result);
    }
    public function testBeforeMarshal()
    {
    $article = $this->Posts->newEntity();
    $article = $this->Posts->patchEntity($article, ['title'=>'Hello World, It\'s a fine day']);
    $this->Posts->save($article);

    $result = $this->Posts->find()->first();
    $this->assertEquals('hello-world-it-s-a-fine-day', $result['slug']);
    }
}
