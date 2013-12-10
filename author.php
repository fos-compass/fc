<?php
require_once("color.php");
require_once("survey.php");

class Answer extends Question {
	private $response;
	private $citation;

	public function __construct($question, $response, $citation) {
		parent::__construct($question);
		$this->response = $response;
		$this->citation = $citation;
	}

	public function __toString() {
		return $this->stringify($this->response, $this->citation);
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

    public function __construct($auth_name, $color, $questions, $answers, $citations) {
        $this->auth_name = $auth_name;
        $this->survey = array();

        assert(count($questions) == count($answers));
		assert(count($answers) == count($citations));

        $this->s_val = 0;
        $this->m_val = 0;

        for($i = 0; $i < count($questions); $i++) {
			$this->survey[] = new Answer($questions[$i], $answers[$i], $citations[$i]);
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

$authors = array(
    new Author("Lawrence Lessig", $colors["aqua"], $survey,
          array(1, 1, 1, -1, 1, -1, 1, 2, 1, 2, 1, 1, 1, 1, -1, -1, 1),
		  array("A0 p.158", "A0 p.68", "A1", "A1", "A0 p.68", "A1", "A1", "A0 p.138", "A0 p.68", "A0 p.262", "A0 p.A0", "", "A0 p.156", "A0 p.135", "A0 p.135", "A0 p.77", "A0 p.153")),

    new Author("Eric Raymond", $colors["navy"], $survey,
          array(2, 1, 2, -1, 1, -1, 1, 2, 2, 2, 2, -1, 1, 1, 1, -1, 2),
		  array("B0", "", "B1 sec.2", "B3", "B0", "B1 sec.2", "B1 sec.2", "B1 sec.2", "B0", "B1", "B0", "B2", "", "B1", "B1", "B3", "B0")),

    new Author("Mark Shuttelworth", $colors["purple"], $survey,
          array(1, 1, 1, -1, 1, -1, 1, 1, 2, 2, 1, 1, 1, 1, 1, -1, 2),
		  array("C5", "C0", "C7", "C8", "C0", "C7", "C5", "C0", "C1", "C6", "C0", "C4", "C5", "C7", "C7", "C3", "C2")),

    new Author("Richard Stallman", $colors["red"], $survey,
          array(2, 2, 2, -1, 2, -2, 2, 2, 2, 1, 2, -2, 2, -1, 1, 1, 2),
		  array("D0", "D1", "D3", "D7", "D5", "D3", "D3", "D0", "D5", "D3", "D1", "D2", "D3", "D4", "D4", "D6", "D0")),

    new Author("Linus Torvalds", $colors["blue"], $survey,
          array(1, 1, 1, -1, 1, 1, 1, 2, 2, 2, 1, 1, -1, 1, 1, -1, 1),
		  array("E0 p.207,217", "E3", "E1", "E5", "E5", "E1", "E0 p.227", "E1", "E0 p.213", "E0 p.227", "E2", "E4", "E4", "E0 p.208", "E0 p.207", "E3", "E2")),

    new Author("Bill Gates", $colors["lime"], $survey,
          array(-1, -2, 1, 2, -2, 1, -2, -1, -1, -1, -2, 2, -1, -1, 1, 1, -1),
		  array("F4", "F3", "F8", "F0", "F4", "F7", "E0 p.227", "F5", "", "E0 p.227", "F6", "F5", "F4", "F2", "F2", "F1", "F4")),
    );
?>
