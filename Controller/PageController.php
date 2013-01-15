<?php

namespace StartPack\CMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use StartPack\CoreBundle\Controller\AbstractCoreController;

 /**
     * @Route("/{slug}")
     */
class PageController extends AbstractCoreController
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction($slug)
    {
    	$page = $this->getDoctrine()->getRepository('CoreBundle:Page')->findOneBySlug($slug);
        
        return array(
        	'page'     => $page,
        	'slug'     => $slug
        );
    }
}
