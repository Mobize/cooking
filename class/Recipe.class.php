<?php

class Recipe extends Model {

	private $id;
	private $type;
	private $title;
	private $ingredients;
	private $content;
	private $picture;
	private $date;

	public static $default_picture = 'img/recipe.png';

	const RECIP_TYPE_DEFAULT = 0;
	const RECIP_TYPE_CAKE = 1;
	const RECIP_TYPE_FAST_FOOD = 2;
	const RECIP_TYPE_SOUP = 3;

	public static $type_labels = array(
		self::RECIP_TYPE_DEFAULT => 'cuisine',
		self::RECIP_TYPE_CAKE => 'gâteaux',
		self::RECIP_TYPE_FAST_FOOD => 'fast food',
		self::RECIP_TYPE_SOUP => 'soupe',
	);

	public static function getTypeLabel($type) {
		if (isset(self::$type_labels[$type])) {
			return self::$type_labels[$type];
		}
		return self::$type_labels[self::RECIP_TYPE_DEFAULT];
	}

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
		return nl2br($this->ingredients);
	}
	public function getContent($max_length = 0, $end = '...') {
		if ($max_length === 0) {
			return nl2br($this->content);
		}
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


	/* Search */
	public static function search($input) {

		if (empty($input)) {
			return new Search();
		}

		$entity = self::getClass();
		$quick_search = !empty($input['search']) ? $input['search'] : '';

		$search_filters = array();
		if (!empty($quick_search)) {
			$separator = 'OR';
			$search_filters = array(
				'title' => '%'.$quick_search.'%',
				'ingredients' => '%'.$quick_search.'%',
				'content' => '%'.$quick_search.'%'
			);
		} else {
			$separator = 'AND';
			foreach($input as $key => $value) {
				if (!empty($value) && property_exists($entity, $key)) {
					$search_filters[$key] = (is_numeric($value) ? $value : '%'.$value.'%');
				}
			}
		}

		return new Search($entity, $input, $search_filters, $separator);
	}

}