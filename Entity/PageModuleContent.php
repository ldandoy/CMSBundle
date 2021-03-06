<?php

namespace StartPack\CMSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageModuleContent
 *
 * @ORM\Table(name="page_module_content")
 * @ORM\Entity
 */
class PageModuleContent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="text", nullable=false)
     */
    private $valeur;

    /**
     * @var \PageModule
     *
     * @ORM\ManyToOne(targetEntity="PageModule")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="page_module", referencedColumnName="id")
     * })
     */
    private $pageModule;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return PageModuleContent
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set valeur
     *
     * @param string $valeur
     * @return PageModuleContent
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    
        return $this;
    }

    /**
     * Get valeur
     *
     * @return string 
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set pageModule
     *
     * @param \StartPack\CMSBundle\Entity\PageModule $pageModule
     * @return PageModuleContent
     */
    public function setPageModule(\StartPack\CMSBundle\Entity\PageModule $pageModule = null)
    {
        $this->pageModule = $pageModule;
    
        return $this;
    }

    /**
     * Get pageModule
     *
     * @return \StartPack\CMSBundle\Entity\PageModule 
     */
    public function getPageModule()
    {
        return $this->pageModule;
    }
}