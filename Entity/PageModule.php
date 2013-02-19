<?php

namespace StartPack\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * StartPack\CoreBundle\Entity\PageModule
 *
 * @ORM\Table(name="page_module")
 * @ORM\Entity
 */
class PageModule {
	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var integer $colonneId
	 *
	 * @ORM\Column(name="colonne_id", type="integer", nullable=false)
	 */
	private $colonneId;

	/**
	 * @var integer $ordre
	 *
	 * @ORM\Column(name="ordre", type="integer", nullable=false)
	 */
	private $ordre;

	/**
	 * @var Page
	 *
	 * @ORM\ManyToOne(targetEntity="Page")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="page", referencedColumnName="id")
	 * })
	 */
	private $page;

	/**
	 * @var Module
	 *
	 * @ORM\ManyToOne(targetEntity="Module")
	 * @ORM\JoinColumns({
	 *   @ORM\JoinColumn(name="module", referencedColumnName="id")
	 * })
	 */
	private $module;

	/**
	 * @var pageModuleContents
	 *
	 * @ORM\OneToMany(targetEntity="PageModuleContent", mappedBy="pageModule")
	 * 
	 */
	private $pageModuleContents;

	public function __construct() {
		$this->pageModuleContents = new ArrayCollection();
	}

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set colonneId
	 *
	 * @param integer $colonneId
	 * @return PageModule
	 */
	public function setColonneId($colonneId) {
		$this->colonneId = $colonneId;

		return $this;
	}

	/**
	 * Get colonneId
	 *
	 * @return integer 
	 */
	public function getColonneId() {
		return $this->colonneId;
	}

	/**
	 * Set ordre
	 *
	 * @param integer $ordre
	 * @return PageModule
	 */
	public function setOrdre($ordre) {
		$this->ordre = $ordre;

		return $this;
	}

	/**
	 * Get ordre
	 *
	 * @return integer 
	 */
	public function getOrdre() {
		return $this->ordre;
	}

	/**
	 * Set module
	 *
	 * @param StartPack\CoreBundle\Entity\Module $module
	 * @return PageModule
	 */
	public function setModule(\StartPack\CoreBundle\Entity\Module $module = null) {
		$this->module = $module;

		return $this;
	}

	/**
	 * Get module
	 *
	 * @return StartPack\CoreBundle\Entity\Module 
	 */
	public function getModule() {
		return $this->module;
	}

	/**
	 * Set pageModuleContents
	 *
	 * @param string $pageModuleContents
	 * @return Page
	 */
	public function setPageModules($pageModuleContents) {
		$this->pageModuleContents = $pageModuleContents;

		return $this;
	}

	/**
	 * Get pageModuleContents
	 *
	 * @return string 
	 */
	public function getPageModuleContents() {
		return $this->pageModuleContents;
	}
}
