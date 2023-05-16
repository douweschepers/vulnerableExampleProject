<?php

require_once './queryCreator.php';
require_once './Team.php'; 
require_once './TeamController.php'; 

class Player
{
	private string $Name = 'somePropertyOfClass';
	private string $Age = 'somePropertyOfClass';
	private string $Postalcode = 'somePropertyOfClass';


	/**
	 * Set function
	 */
	public function setName(string $Name): void
	{
		$this->Name=$Name;
	}


	/**
	 * get function.
	 */
	public function getName(): ?string
	{
		return $this->Name;
	}


	/**
	 * Set function
	 */
	public function setAge(string $Age): void
	{
		$this->Age=$Age;
	}


	/**
	 * get function.
	 */
	public function getAge(): ?string
	{
		return $this->Age;
	}


	/**
	 * Set function
	 */
	public function setPostalcode(string $Postalcode): void
	{
		$this->Postalcode=$Postalcode;
	}


	/**
	 * get function.
	 */
	public function getPostalcode(): ?string
	{
		return $this->Postalcode;
	}
}