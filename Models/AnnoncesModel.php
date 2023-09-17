<?php
namespace App\Models;

class AnnoncesModel extends Model{
    protected $id;
    protected $titre;
    protected $description;
    protected $created_at;
    protected $actif;

    public function __construct(){
        
        $this->table='annonces';
    }

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * @param mixed $description 
	 * @return self
	 */
	public function setDescription($description): self {
		$this->description = $description;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCreated_at() {
		return $this->created_at;
	}
	
	/**
	 * @param mixed $created_at 
	 * @return self
	 */
	public function setCreated_at($created_at): self {
		$this->created_at = $created_at;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getActif() {
		return $this->actif;
	}
	
	/**
	 * @param mixed $actif 
	 * @return self
	 */
	public function setActif($actif): self {
		$this->actif = $actif;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTitre() {
		return $this->titre;
	}
	
	/**
	 * @param mixed $titre 
	 * @return self
	 */
	public function setTitre($titre): self {
		$this->titre = $titre;
		return $this;
	}

}
?>