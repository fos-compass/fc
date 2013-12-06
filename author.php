<?php
require("survey.php");

class Author {
    private $auth_name;
    
    private $s_val;
    private $m_val;

    private $answers;

    private $color;

    public function __construct($auth_name, $color, $questions, $answers) {
        $this->auth_name = $name;
        $this->answers = $answers;

        assert(count($questions) == count($answers));

        for($i = 0; $i < count($answers); $i++) {
            $s_val += $questions[i].get_sharability($answers[i]);
            $m_val += $questions[i].get_mutability($answers[i]);
        }

        $this->color = $color;
    }

    public function get_s_val() {
        return $s_val;
    }

    public function get_m_val() {
        return $m_val
    }

    public function get_color() {
        return $color
    }
}

$authors = [
    new Author("Lawrence Lessig", [174,174,233], $survey,
          [1, 1, 0, -1, 2, 0, 1, 2, 2, 1, 1, 1, 1, 1, -1, -1, 1])
    ]
?>

