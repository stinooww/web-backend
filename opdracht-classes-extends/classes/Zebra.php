<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 23-11-2016
 * Time: 23:56
 */


	class Zebra extends Animal
	{
		protected $lionSpecies;

		public function __construct(  $name, $sex, $health, $lionSpecies )
		{

			parent::__construct( $name, $sex, $health );

			$this->lionSpecies = $lionSpecies;
		}

		public function getSpecies()
		{
			return $this->lionSpecies;
		}

	}

?>