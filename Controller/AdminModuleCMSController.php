<?php

namespace StartPack\CMSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use StartPack\CoreBundle\Form as Form;
use StartPack\CMSBundle\Entity as CMSModel;
use StartPack\CMSBundle\Form as CMSForm;

use StartPack\CoreBundle\Controller\AbstractCoreController;

/**
 * CMS Admin Controller
 * 
 * @Route("/admin/cms/page/{id_page}/module")
 */
class AdminModuleCMSController extends AbstractCoreController
{
    /**
     * addAction
     * 
     * @Route("/add", name="admin_cms_module_add")
     * @ParamConverter("page", class="CMSBundle:Page", options={"id" = "id_page"})
     */
    public function addAction(CMSModel\Page $page)
    {
        $pageModule = new CMSModel\PageModule();
        $pageModule->setPage($page);
        $pageModule->setOrdre(0);

        $form = $this->createForm(new CMSForm\PageModuleType(), $pageModule);

        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $this->saveAndFlush($pageModule);
                $this->get('session')->setFlash('success', "Module bien ajouté");
            } else {
                $this->get('session')->setFlash('error', "Not valide: " . $form->getErrorsAsString());
            }
        } else {
            $this->get('session')->setFlash('error', $form->getErrorsAsString());
        }

        return $this->redirect($this->generateUrl('admin_cms_page_view', array('id' => $page->getId())));
    }

    /**
     * @Route("/{id_page_module}/edit", name="admin_cms_module_edit")
     * @ParamConverter("page", class="CMSBundle:Page", options={"id" = "id_page"})
     * @ParamConverter("pageModule", class="CMSBundle:PageModule", options={"id" = "id_page_module"})
     * @Template()
     */
    public function editAction(CMSModel\Page $page, CMSModel\PageModule $pageModule)
    {
        if ($this->getRequest()->getMethod() == 'POST') {
            // On boucle sur les champs des modules.
            foreach ($pageModule->getPageModuleContents() as $pageModuleContents) {
                $pageModuleContents->setValeur($this->get('request')->request->get($pageModuleContents->getLibelle() . '-' . $pageModuleContents->getId()));
                $this->saveAndFlush($pageModuleContents);
            }
        }

        return array(
            'page'          => $page,
            'pageModule'    => $pageModule,
            'activeCMS'     => true
        );
    }

    /**
     * @Route("/{id_page_module}/delete", name="admin_cms_module_delete")
     * @ParamConverter("page", class="CMSBundle:Page", options={"id" = "id_page"})
     * @ParamConverter("pageModule", class="CMSBundle:PageModule", options={"id" = "id_page_module"})
     * @Template()
     */
    public function delAction(CMSModel\Page $page, CMSModel\PageModule $pageModule)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($pageModule);
        $em->flush();
        $this->get('session')->setFlash('success', "Module bien supprimer de la page");

        return $this->redirect($this->generateUrl('admin_cms_page_view', array('id' => $page->getId())));
    }
}
