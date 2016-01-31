<?php


namespace AppBundle\Service;

use FOS\ElasticaBundle\Finder\FinderInterface;

/**
 * Class ElasticSearcher
 *
 * @author Vladislav Shishko <13thMerlin@gmail.com>
 */
class ElasticSearcher implements SearchableInterface
{
    /**
     * @var FinderInterface
     */
    protected $textFinder;

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'elastic';
    }

    /**
     * {@inheritDoc}
     */
    public function search($query)
    {
        return $this->textFinder->find($query);
    }

    /**
     * @param FinderInterface $textFinder
     */
    public function setTextFinder(FinderInterface $textFinder)
    {
        $this->textFinder = $textFinder;
    }
}