<?php

namespace TournamentSystem\Controller\Soccer;

use DateTime;
use TournamentSystem\Controller\Controller;
use TournamentSystem\Model\Coach;
use TournamentSystem\View\CoachView;

class CoachController extends Controller {

	public function __construct() {
		parent::__construct('SELECT * FROM tournament_coach NATURAL JOIN tournament_person WHERE id=?');
	}

	protected function get(): int {
		$this->stmt[0]->bind_param('i', $_REQUEST['id']);
		$this->stmt[0]->execute();

		if($result = $this->stmt[0]->get_result()) {
			if($coach = $result->fetch_assoc()) {
				$coach = new Coach(
					$coach['id'],
					$coach['firstname'],
					$coach['name'],
					new DateTime($coach['birthday']),
					$coach['gender']
				);

				parent::render(new CoachView($coach));
			}

			$result->free();
		}

		return parent::OK;
	}
}
