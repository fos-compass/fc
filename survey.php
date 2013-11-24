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

$survey = [ new Question("I agree", 0, 1),
			new Question("I disagree", 0, -1) ];
?>
