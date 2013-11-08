<?php 

	class laboratorio
	{
		private $id_lab;
		private $cod_lab;
		private $institucion;
		private $sector;
		private $responsable;
		private $domicilio;
		private $domicilio_corresp;
		private $mail;
		private $tel;
		private $coord_x;
		private $coord_y;
		private $estado;
		private $id_tipo;
		private $id_ciudad;

		public function init($id_lab, $cod_lab, $institucion, $sector, $responsable, $domicilio, $domicilio_corresp, $mail, $tel, $coord_x, $coord_y, $estado, $id_tipo, $id_ciudad) 
	    {
	    $this->id_lab = $id_lab;  
	    $this->$cod_lab = $cod_lab;
	    $this->institucion = $institucion;
	    $this->sector = $sector;
	    $this->responsable = $responsable;
	    $this->domicilio = $domicilio;
	    $this->domicilio_corresp = $domicilio_corresp;
	    $this->mail = $mail;
	    $this->tel = $tel;
	    $this->coord_x = $coord_x;
	    $this->coord_y = $coord_y;
	    $this->estado = $estado;
	    $this->id_tipo = $id_tipo;
	    $this->id_ciudad = $id_ciudad;
	    }

	    public function setId_lab($id_lab)
		{
		$this->id_lab = $id_lab;
		return $this;
		}

		public function getId_lab()
		{
		return $this->id_lab;
  		}

  		public function setCod_lab($cod_lab)
  		{
  		$this->cod_lab = $cod_lab;
  		return $this;
  		}

  		public function getCod_lab()
		{
		return $this->cod_lab;
  		}

  		public function setInstitucion($institucion)
  		{
  		$this->institucion = $institucion;
  		return $this;
  		}

  		public function getInstitucion()
		{
		return $this->institucion;
  		}

  		public function setSector($sector)
  		{
  		$this->sector = $sector;
  		return $this;
  		}

  		public function getSector()
		{
		return $this->sector;
  		}

  		public function setResponsable($responsable)
  		{
  		$this->responsable = $responsable;
  		return $this;
  		}

  		public function getResponsable()
		{
		return $this->responsable;
  		}

  		public function setDomicilio($domicilio)
  		{
  		$this->domicilio = $domicilio;
  		return $this;
  		}

  		public function getDomicilio()
		{
		return $this->domicilio;
  		}

  		public function setDomicilio_corresp($domicilio_corresp)
  		{
  		$this->domicilio_corresp = $domicilio_corresp;
  		return $this;
  		}

  		public function getDomicilio_corresp()
		{
		return $this->domicilio;
  		}

  		public function setMail($mail)
  		{
  		$this->mail = $mail;
  		return $this;
  		}

  		public function getMail()
		{
		return $this->mail;
  		}

  		public function setTel($tel)
  		{
  		$this->tel = $tel;
  		return $this;
  		}

  		public function getTel()
		{
		return $this->tel;
  		}

  		public function setcoord_x($coord_x)
  		{
  		$this->coord_x = $coord_x;
  		return $this;
  		}

  		public function getcoord_x()
		{
		return $this->coord_x;
  		}

  		public function setcoord_y($coord_y)
  		{
  		$this->coord_y = $coord_y;
  		return $this;
  		}

  		public function getcoord_y()
		{
		return $this->coord_y;
  		}

  		public function setEstado($estado)
  		{
  		$this->estado = $estado;
  		return $this;
  		}

  		public function getEstado()
		{
		return $this->estado;
  		}

  		public function setId_tipo($id_tipo)
  		{
  		$this->id_tipo = $id_tipo;
  		return $this;
  		}

  		public function getId_tipo()
		{
		return $this->id_tipo;
  		}

  		public function setId_ciudad($id_ciudad)
  		{
  		$this->id_ciudad = $id_ciudad;
  		return $this;
  		}

  		public function getId_ciudad()
		{
		return $this->id_ciudad;
  		}

	}

 ?>