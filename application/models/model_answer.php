<?php

/**
 * Class model_answer
 */
Class model_answer extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	/**
	 * Returns all answers associated with a given course's question
	 * @param $courseID
	 * @param $questionOrder
	 * @return array
	 */
	public function GetAnswers($courseID, $questionOrder) {
		$this->db->where('courseID', $courseID);
		$this->db->where('questionOrder', $questionOrder);
		$this->db->order_by("answerOrder", "asc");

		$query = $this->db->get('answers');

		if ($query->num_rows > 0) {
			return $query->result();
		} else {
			return array();
		}
	}

	/**
	 * Returns all answers associated with a given course's question
	 * @param $courseID
	 * @return array
	 */
	public function GetCorrectAnswers($courseID) {
		$this->db->where('courseID', $courseID);
		$this->db->where('correct', TRUE);
		$this->db->order_by("questionOrder", "asc");
		$query = $this->db->get('answers');

		$answers = array();

		foreach ($query->result() as $row) {
			$answers[$row->questionOrder] = $row->answerOrder;
		}

		return $answers;
	}

	/**
	 * Delete all answers for a given course with a answer order equal to or higher than that given
	 * @param $courseID
	 * @param $questionOrder
	 * @param $answerOrder
	 */
	public function DeleteHigherAnswers($courseID, $questionOrder, $answerOrder) {
		$this->db->where('courseID', $courseID);
		$this->db->where('questionOrder', $questionOrder);
		$this->db->where('answerOrder >=', $answerOrder);
		$this->db->delete('answers');
	}

	/**
	 * Add a new answer to the answers table for a given course, or updates if it already exists
	 * @param $courseID
	 * @param $questionOrder
	 * @param $answerOrder
	 * @param $correct
	 * @param $answerText
	 */
	public function SaveAnswer($courseID, $questionOrder, $answerOrder, $correct, $answerText) {
		$this->db->where('courseID', $courseID);
		$this->db->where('questionOrder', $questionOrder);
		$this->db->where('answerOrder', $answerOrder);
		$query = $this->db->get('answers');


		if ($query->num_rows > 0) {
			// previous answer with this order exist; update
			$data = array(
				'answerText' => $answerText,
				'correct' => $correct,
			);

			$this->db->where('courseID', $courseID);
			$this->db->where('questionOrder', $questionOrder);
			$this->db->where('answerOrder', $answerOrder);

			$this->db->update('answers', $data);
		} else {
			// previous answer with this order doesn't exist; insert
			$data = array(
				'courseID' => $courseID,
				'questionOrder' => $questionOrder,
				'answerOrder' => $answerOrder,
				'correct' => $correct,
				'answerText' => $answerText,
			);

			$this->db->insert('answers', $data);
		}
	}
}
?>