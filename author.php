<?php
require_once("color.php");
require_once("survey.php");

class Author {
    private $auth_name;
    
    private $s_val;
    private $m_val;

    private $answers;

    private $color;

    public function __construct($auth_name, $color, $questions, $answers) {
        $this->auth_name = $auth_name;
        $this->answers = $answers;

        assert(count($questions) == count($answers));

        $this->s_val = 0;
        $this->m_val = 0;

        for($i = 0; $i < count($answers); $i++) {
            $this->s_val += $questions[$i]->get_shareability($answers[$i]);
            $this->m_val += $questions[$i]->get_mutability($answers[$i]);
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
