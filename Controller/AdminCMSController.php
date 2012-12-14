<?php

namespace StartPack\CMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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

    /**
     * @Route("/{id_page}/module/{id_page_module}", name="admin_cms_module_edit")
     * @ParamConverter("page", class="CoreBundle:Page", options={"id" = "id_page"})
     * @ParamConverter("pageModule", class="CoreBundle:PageModule", options={"id" = "id_page_module"})
     * @Template()
     */
    public function module_editAction(Model\Page $page, Model\PageModule $pageModule)
    {
        if ($this->getRequest()->getMethod() == 'POST') {
            
            // On boucle sur les champs des modules.
            foreach ($pageModule->getPageModuleContents() as $key => $pageModuleContents) {
                $pageModuleContents->setValeur($this->get('request')->request->get($pageModuleContents->getLibelle() . '-'.$pageModuleContents->getId()));
                $this->saveAndFlush($pageModuleContents);
            }
        }

        return array(
            'page'      =>  $page,
            'pageModule'    =>  $pageModule,
            'activeCMS' =>  true
        );
    }
}
