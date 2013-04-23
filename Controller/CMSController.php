<?php

namespace StartPack\CMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use StartPack\CoreBundle\Entity as Model;
use StartPack\CoreBundle\Form as Form;

use StartPack\CMSBundle\Entity as CMSModel;
use StartPack\CMSBundle\Form as CMSForm;

use StartPack\CoreBundle\Controller\AbstractCoreController;

/**
 * @Route("/page/{slug}")
 */
class CMSController extends AbstractCoreController {
	/**
	 * @Route("/", name="page")
	 * @Template()
	 */
	public function indexAction($slug) {
		$pageRequested = $this->getDoctrine()->getRepository('CMSBundle:Page')->findOneBySlug($slug);
		$config = $this->getDoctrine()->getRepository('CoreBundle:Config')->getConfig();
		
		return array('pageName' => $pageRequested->getName(), 'pageRequested' => $pageRequested, 'config' => $config, 'slug' => $slug);
	}
}
