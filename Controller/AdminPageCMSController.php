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
 * @Route("/admin/cms/page")
 */
class AdminPageCMSController extends AbstractCoreController
{
    /**
     * @Route("/", name="admin_cms_page_index")
     * @Template()
     * 
     * @return temaplte
     */
    public function indexAction()
    {
        $pages = $this->getDoctrine()->getRepository('CMSBundle:Page')->findAll();

        $form = $this->createForm(new CMSForm\PageType(), new CMSModel\Page());

        return array('pages' => $pages, 'form' => $form->createView(), 'activeCMS' => true);
    }

    /**
     * viewAction
     * @param CMSModel\Page $page
     * 
     * @route("/{id}/view", name="admin_cms_page_view")
     * @template()
     * 
     * @return temaplte
     */
    public function viewAction(CMSModel\Page $page)
    {
        $form = $this->createForm(new CMSForm\PageModuleType(), new CMSModel\PageModule());

        return array(
            'page' => $page,
            'form'  => $form->createView(),
            'activeCMS' => true
        );
    }

    /**
     * addAction
     * 
     * @route("/add", name="admin_cms_page_add")
     * @template()
     * 
     * @return redirection
     */
    public function addAction()
    {
        $page = new CMSModel\Page();
        $form = $this->createForm(new CMSForm\PageType(), $page);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $this->saveAndFlush($page);
                $this->get('session')->setFlash('success', "Page bien créé");
            } else {
                $this->get('session')->setFlash('error', $form->getErrorsAsString());
            }
        }

        return $this->redirect($this->generateUrl('admin_cms_view', array('id' => $page->getId())));
    }

    /**
     * @Route("/{id}/edit", name="admin_cms_page_edit")
     * @ParamConverter("page", class="CMSBundle:Page")
     * @Template()
     */
    public function editAction(CMSModel\Page $page)
    {
        $form = $this->createForm(new CMSForm\PageType(), $page);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $this->saveAndFlush($page);
                $this->get('session')->setFlash('success', "Page bien mise à jour");
            } else {
                $this->get('session')->setFlash('error', $form->getErrorsAsString());
            }
        }

        return array(
            "page" => $page,
            'activeCMS' => true,
            'form' => $form->createView()
        );
    }

    /**
     * @Route("/{id}/del", name="admin_cms_page_del")
     * @ParamConverter("page", class="CMSBundle:Page")
     * @Template()
     */
    public function delAction(CMSModel\Page $page)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($page);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_cms_index'));
    }
}
