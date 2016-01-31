<?php


namespace AppBundle\Tests\Service;

/**
 * Class ElasticSearcherTest
 *
 * @author Vladislav Shishko <13thMerlin@gmail.com>
 */
class ElasticSearcherTest extends \PHPUnit_Framework_TestCase
{
    protected $container;

    public function __construct()
    {
        $kernel = new \AppKernel("test", true);
        $kernel->boot();
        $this->container = $kernel->getContainer();
        parent::__construct();
    }

    public function testThatHasName()
    {
        $this->assertEquals($this->container->get('elastic_searcher')->getName(), 'elastic');
    }
}