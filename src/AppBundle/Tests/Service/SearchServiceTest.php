<?php


namespace AppBundle\Tests\Service;


class SearchServiceTest extends \PHPUnit_Framework_TestCase
{
    protected $container;

    public function __construct()
    {
        $kernel = new \AppKernel("test", true);
        $kernel->boot();
        $this->container = $kernel->getContainer();
        parent::__construct();
    }

    public function testForException()
    {
        $searcher = $this->container->get('searcher_registry');

        try {
            $searcher->search('query', 'foo_searcher');
        } catch (\Exception $e) {

            $this->assertEquals($e->getMessage(), "No searcher with name foo_searcher.");
            return;
        }

        $this->fail("Expected Exception has not been raised.");
    }

}