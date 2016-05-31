<?php

class Contact extends Model {

	protected $id;
	protected $firstname;
	protected $lastname;
	protected $email;
	protected $message;
	protected $date;

	/* Getters */
	public function getId() {
		return $this->id;
	}
	public function getFirstname() {
		return $this->firstname;
	}
	public function getLastname() {
		return $this->lastname;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getMessage() {
		return $this->message;
	}
	public function getDate() {
		return $this->date;
	}

	/* Setters */
	public function setId($id) {
		$this->id = intval($id);
	}
	public function setFirstname($firstname) {
		if (empty($firstname) || strlen($firstname) > 100) {
			throw new Exception('Firstname must not be empty and 100 chars max');
		}
		$this->firstname = strip_tags($firstname);
	}
	public function setLastname($lastname) {
		if (empty($lastname) || strlen($lastname) > 100) {
			throw new Exception('Lastname must not be empty and 100 chars max');
		}
		$this->lastname = strip_tags($lastname);
	}
	public function setEmail($email) {
		if (empty($email) || strlen($email) > 255) {
			throw new Exception('Email must not be empty and 255 chars max');
		} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new Exception('Email must be valid');
		}
		$this->email = strip_tags($email);
	}
	public function setMessage($message) {
		if (empty($message) || strlen($message) > 65535) {
			throw new Exception('Message must not be empty and 65535 chars max');
		}
		$this->message = strip_tags($message);
	}
	public function setDate($date) {
		if (empty($date) || strtotime($date) === false) {
			throw new Exception('Date must be valid');
		}
		$this->date = $date;
	}


	public function save() {

		$bindings = array(
			':id' => $this->id,
			':firstname' => $this->firstname,
			':lastname' => $this->lastname,
			':email' => $this->email,
			':message' => $this->message
		);

		return Db::insert('INSERT INTO contact SET id = :id, firstname = :firstname, lastname = :lastname, email = :email, message = :message, date = NOW()', $bindings);
	}
}
