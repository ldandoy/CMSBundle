<?php

namespace StartPack\CMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use StartPack\CoreBundle\Entity as Model;
use StartPack\CoreBundle\Form as Form;

use StartPack\CoreBundle\Controller\AbstractCoreController;

 /**
     * @Route("/page/{slug}")
     */
class CMSController extends AbstractCoreController
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction($slug)
    {
    	$page = $this->getDoctrine()->getRepository('CoreBundle:Page')->findOneBySlug($slug);
        $config = $this->getDoctrine()->getRepository('CoreBundle:Config')->getConfig();
        
        return array(
        	'page'     => $page,
            'config'   => $config,
        	'slug'     => $slug
        );
    }
}
