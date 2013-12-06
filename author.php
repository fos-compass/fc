<?php
echo "BLAH";
require_once("survey.php");
echo "BLAH";

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

//var_dump($survey);

$authors = [
    new Author("Lawrence Lessig", array("R"=>200,"G"=>200,"B"=>200), $survey,
          [1, 1, 0, -1, 2, 0, 1, 2, 2, 1, 1, 1, 1, 1, -1, -1, 1])
    ];
?>

