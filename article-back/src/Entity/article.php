<?php

namespace Digi\Keha\Entity;
use Digi\Keha\Kernel\Model;


class article extends Model {
    private  $id;
    private  $libelle;
    private $prix;

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLibelle(): string {
		return $this->libelle;
	}
	
	/**
	 * @param string $libelle 
	 * @return self
	 */
	public function setLibelle(string $libelle): self {
		$this->libelle = $libelle;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getPrix(): float {
		return $this->prix;
	}
	
	/**
	 * @param float $prix 
	 * @return self
	 */
	public function setPrix(float $prix): self {
		$this->prix = $prix;
		return $this;
	}
}