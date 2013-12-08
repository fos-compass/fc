<?php
require_once("color.php");
require_once("survey.php");

class Answer extends Question {
	private $response;

	public function __construct($question, $response) {
		parent::__construct($question);
		$this->response = $response;
	}

	public function __toString() {
		return $this->stringify($this->response);
	}

	public function get_shareability() {
		return parent::get_shareability($this->response);
	}

	public function get_mutability() {
		return parent::get_mutability($this->response);
	}
}

class Author {
    private $auth_name;
    
    private $s_val;
    private $m_val;

    private $survey;

    private $color;

    public function __construct($auth_name, $color, $questions, $answers) {
        $this->auth_name = $auth_name;
        $this->survey = [];

        assert(count($questions) == count($answers));

        $this->s_val = 0;
        $this->m_val = 0;

        for($i = 0; $i < count($answers); $i++) {
			$this->survey[] = new Answer($questions[$i], $answers[$i]);
            $this->s_val += $this->survey[$i]->get_shareability();
            $this->m_val += $this->survey[$i]->get_mutability();
        }

        $this->color = $color;
    }

    public function get_auth_name() {
        return $this->auth_name;
    }

    public function get_s_val() {
        return $this->s_val;
    }

    public function get_m_val() {
        return $this->m_val;
    }

    public function get_color() {
        return $this->color;
    }

	public function get_all_the_things() {
		return $this->survey;
	}
}

$authors = [
    new Author("Lawrence Lessig", $colors["aqua"], $survey,
          [1, 1, 1, -1, 1, -1, 1, 2, 1, 2, 1, 1, 1, 1, -1, -1, 1]),

    new Author("Eric Raymond", $colors["navy"], $survey,
          [2, 1, 2, -1, 1, -1, 1, 2, 2, 2, 2, -1, 1, 1, 1, -1, 2]),

    new Author("Mark Shuttelworth", $colors["purple"], $survey,
          [1, 1, 1, -1, 1, -1, 1, 1, 2, 2, 1, 1, 1, 1, 1, -1, 2]),

    new Author("Richard Stallman", $colors["red"], $survey,
          [2, 2, 2, -1, 2, -1, 2, 2, 2, 1, 2, -2, 2, -1, 1, 1, 2]),

    new Author("Linus Torvalds", $colors["blue"], $survey,
          [1, 1, 1, -1, 1, 1, 1, 2, 2, 2, 1, 1, -1, 1, 1, -1, 1]),

    new Author("Bill Gates", $colors["lime"], $survey,
          [-1, -2, 1, 2, -2, 1, -2, -1, -1, -1, -2, 2, -1, -1, 1, 1, -1]),
          
    ];
?>
