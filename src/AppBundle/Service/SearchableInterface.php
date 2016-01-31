<?php


namespace AppBundle\Service;

/**
 * Interface SearchableInterface
 *
 * @author Vladislav Shishko <13thMerlin@gmail.com>
 */
interface SearchableInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param mixed $query
     *
     * @return []
     */
    public function search($query);
}