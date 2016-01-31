<?php


namespace AppBundle\Service;


use AppBundle\Exception\SearcherException;

/**
 * Class SearchService
 *
 * @author Vladislav Shishko <13thMerlin@gmail.com>
 */
class SearchService
{
    /**
     * @var SearchableInterface[]
     */
    protected $searchers;

    /**
     * @param string $query
     * @param string $searcherName
     *
     * @return []
     *
     * @throws SearcherException
     */
    public function search($query, $searcherName)
    {
        return $this->getSearcher($searcherName)->search($query);
    }

    /**
     * @param string $searcherName
     *
     * @return SearchableInterface
     *
     * @throws SearcherException
     */
    private function getSearcher($searcherName)
    {
        foreach($this->searchers as $searcher) {
            if ($searcher->getName() === $searcherName) {
                return $searcher;
            }
        }

        throw new SearcherException(sprintf('No searcher with name %s.', $searcherName));
    }

    /**
     * @param SearchableInterface $item
     */
    public function addItem(SearchableInterface $item)
    {
        $this->searchers[] = $item;
    }
}