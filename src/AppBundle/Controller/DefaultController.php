<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 *
 * @author Vladislav Shishko <13thMerlin@gmail.com>
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {

        $query = $request->get('q');
        $results = [];

        if ($query) {
            $results = $this->get('searcher_registry')->search($query, 'elastic');
        }

        return $this->render('default/index.html.twig', array(
            'results' =>  $results
        ));
    }

}
