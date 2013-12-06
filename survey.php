<?php
class Question {
	private static $instances = 0;
	private $id;
	private $text;
	private $shareable_multable; // multiple plier
	private $mutable_multable; // multiple plier

	public function __construct($text, $shareable_multable, $mutable_multable) {
		$this->id = Question::$instances++;
		$this->text = $text;
		$this->shareable_multable = $shareable_multable;
		$this->mutable_multable = $mutable_multable;
	}

	public function __toString() {
		return "<tr>
					<td>{$this->text}</td>
					<td>
						<input type=\"radio\" name=\"{$this->id}\" value=\"-2\"/>Strongly disagree<br/>
						<input type=\"radio\" name=\"{$this->id}\" value=\"-1\"/>Disagree<br/>
						<input type=\"radio\" name=\"{$this->id}\" value=\"1\"/>Agree<br/>
						<input type=\"radio\" name=\"{$this->id}\" value=\"2\"/>Strongly agree
					</td>
				</tr>";
	}

	public function get_shareability($response) {
		return $response * $this->shareable_multable;
	}

	public function get_mutability($response) {
		return $response * $this->mutable_multable;
	}
}

$survey = [ new Question("If I buy content (music, books, movies, software, 
                          etc.), I should be able to use it on all my devices.", 
                         0, 1),

			new Question("If I buy content, I should be able to share it with 
                          my friends, as is.", 
                         1, 0),

			new Question("My legal modifications to a work should be 
                          distributable in both computer-readable and 
                          human-readable format.", 
                         1, 0),

			new Question("If I use a work, I am responsible for licensing any 
                          involved intellectual property.", 
                         1, 0),

			new Question("If content I buy contains digital rights management, 
                          I would not feel guilty obtaining, at no extra cost,
                          an unencumbered version.", 
                         -1, 0),

			new Question("Share-alike reduces user choice because the permission
                          to create a less free version is a form of freedom.", 
                         1, 0),

			new Question("Digital creations should be delivered with everything 
                          I need, including the original artifacts, to change 
                          or customize them.", 
                         0, 1),

			new Question("I should not be impeded from modifying a cultural work 
                          for my own private use.", 
                         0, 1),

			new Question("If content I buy contains digital rights management, 
                          I should not be penalized for breaking it.", 
                         0, 1),

			new Question("Knowing how works are made enhances technological 
                          innovation and development.", 
                         0, 1),

			new Question("Creators should not incorporate restrictions into a 
                          device that limit its manner of use.", 
                         0, 1),

			new Question("I don\u2019t mind downloading verified software that 
                          costs nothing but is only distributed in binary 
                          form.", 
                         0, -1),

			new Question("If I make changes to some work I have bought, 
                          I should be able to share those changes with my 
                          friends.", 
                         1, 1),

			new Question("Cultural works are owned by no one.", 
                         1, 1),

			new Question("Cultural works are owned by their authors.", 
                         -1, -1),

			new Question("If someone uses my intellectual property without 
                          notifying me, I will pursue legal action.", 
                         1, 1),

			new Question("Works should not contain digital rights management.", 
                         1, 1) ];
?>
