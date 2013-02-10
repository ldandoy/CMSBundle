<?php

namespace StartPack\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * StartPack\CoreBundle\Entity\Page
 *
 * @ORM\Table(name="page")
 * @ORM\Entity
 */
class Page {
	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string $name
	 *
	 * @ORM\Column(name="name", type="string", length=255, nullable=false)
	 */
	private $name;

	/**
	 * @var string $slug
	 *
	 * @ORM\Column(name="slug", type="string", length=255, nullable=false)
	 */
	private $slug;

	/**
	 * @var pageModules
	 *
	 * @ORM\OneToMany(targetEntity="PageModule", mappedBy="page")
	 * 
	 */
	private $pageModules;

	public function __construct() {
		$this->pageModules = new ArrayCollection();
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
	 * Set name
	 *
	 * @param string $name
	 * @return Page
	 */
	public function setName($name) {
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string 
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Set slug
	 *
	 * @param string $slug
	 * @return Page
	 */
	public function setSlug($slug) {
		$this->slug = $slug;

		return $this;
	}

	/**
	 * Get slug
	 *
	 * @return string 
	 */
	public function getSlug() {
		return $this->slug;
	}

	/**
	 * Set pageModules
	 *
	 * @param string $pageModules
	 * @return Page
	 */
	public function setPageModules($pageModules) {
		$this->pageModules = $pageModules;

		return $this;
	}

	/**
	 * Get pageModules
	 *
	 * @return string 
	 */
	public function getPageModules() {
		return $this->pageModules;
	}
}
