<?php

class User {
	private $name;
	private $surname;
	private $type;
	public function __construct($name, $surname, $type) {
		$this->name = $name;
		$this->surname = $surname;
		$this->type = $type;
	}
	public function isAdmin() {
		if($this->type == 'admin')
			return true;
		return false;
	}
	public function getName() {
		return $this->name;
	}
	public function getSurname() {
		return $this->surname;
	}
	public function getType() {
		return $this->type;
	}
	public function getInfo() {
		return $this->name . " " . $this->surname;
	}
}