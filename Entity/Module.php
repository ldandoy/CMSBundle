<?php

namespace StartPack\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StartPack\CoreBundle\Entity\Module
 *
 * @ORM\Table(name="module")
 * @ORM\Entity
 */
class Module {
	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var string $nom
	 *
	 * @ORM\Column(name="nom", type="string", length=255, nullable=false)
	 */
	private $nom;

	/**
	 * @var string $template
	 *
	 * @ORM\Column(name="template", type="string", length=30, nullable=false)
	 */
	private $template;

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set nom
	 *
	 * @param string $nom
	 * @return Module
	 */
	public function setNom($nom) {
		$this->nom = $nom;

		return $this;
	}

	/**
	 * Get nom
	 *
	 * @return string 
	 */
	public function getNom() {
		return $this->nom;
	}

	/**
	 * Set template
	 *
	 * @param string $template
	 * @return Module
	 */
	public function setTemplate($template) {
		$this->template = $template;

		return $template;
	}

	/**
	 * Get template
	 *
	 * @return string 
	 */
	public function getTemplate() {
		return $this->template;
	}
}
