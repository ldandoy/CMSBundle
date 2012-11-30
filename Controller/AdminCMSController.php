<?php

namespace StartPack\CMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use StartPack\CoreBundle\Entity as Model;
use StartPack\CoreBundle\Form as Form;

use StartPack\CoreBundle\Controller\AbstractCoreController;

 /**
     * @Route("/admin/cms")
     */
class AdminCMSController extends AbstractCoreController
{
    /**
     * @Route("/", name="admin_cms_index")
     * @Template()
     */
    public function indexAction()
    {
    	$pages = $this->getDoctrine()->getRepository('CoreBundle:Page')->findAll();
        
        return array(
        	'pages'     =>	$pages,
        	'activeCMS'	=>	true
        );
    }

    /**
     * @Route("/{id}/view", name="admin_cms_view")
     * @Template()
     */
    public function viewAction(Model\Page $page)
    {
        return array(
            "page"  =>  $page,
            'activeCMS' => true
        );
    }

    /**
     * @Route("/{id}/edit", name="admin_cms_edit")
     * @Template()
     */
    public function editAction(Model\Page $page)
    {
        
        $form = $this->createForm(new Form\PageType(), $page);

        return array(
            "page"  =>  $page,
            'activeCMS' => true,
            'form' => $form->createView()
        );
    }
}
