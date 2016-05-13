<?php

class Recipe extends Model {

	public $id;
	public $type;
	public $title;
	public $ingredients;
	public $content;
	public $picture;
	public $date;

	public static $default_picture = 'img/recipe.png';

	/* Getters */
	public function getId() {
		return $this->id;
	}
	public function getType() {
		return $this->type;
	}
	public function getTitle() {
		return ucfirst($this->title);
	}
	public function getIngredients() {
		return $this->ingredients;
	}
	public function getContent($max_length = 0, $end = '...') {
		return Utils::cutString($this->content, $max_length, $end);
	}
	public function getPicture($default = '') {
		$default_picture = $default ?: self::$default_picture;
		if (!empty($this->picture)) {
			$picture_path = 'img/'.$this->picture;
			if (file_exists($picture_path)) {
				return $picture_path;
			}
		}
		return $default_picture;
	}
	public function getDate($format = 'd-m-Y H:i:s') {
		return date($format, strtotime($this->date));
	}

	/* Setters */
	public function setId($id) {
		$this->id = $id;
	}
	public function setType($type) {
		$this->type = $type;
	}
	public function setTitle($title) {
		if (empty($title) && strlen($title) > 100) {
			throw new Exception("Recipe title must not be empty and 100 chars max");
		}
		$this->title = $title;
	}
	public function setIngredients($ingredients) {
		if (empty($ingredients)) {
			throw new Exception("Recipe ingredients must not be empty");
		}
		$this->ingredients = $ingredients;
	}
	public function setContent($content) {
		if (empty($content)) {
			throw new Exception("Recipe content must not be empty");
		}
		$this->content = $content;
	}
	public function setPicture($picture) {
		$this->picture = $picture;
	}
	public function setDate($date) {
		$this->date = $date;
	}

}