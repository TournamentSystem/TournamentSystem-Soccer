<?php

namespace TournamentSystem\Controller\Soccer;

use DateTime;
use TournamentSystem\Controller\Controller;
use TournamentSystem\Model\Player;
use TournamentSystem\View\PlayerView;

class PlayerController extends Controller {

	public function __construct() {
		parent::__construct('SELECT * FROM tournament_player NATURAL JOIN tournament_person WHERE id=?');
	}

	protected function get(): int {
		$this->stmt[0]->bind_param('i', $_REQUEST['id']);
		$this->stmt[0]->execute();

		if($result = $this->stmt[0]->get_result()) {
			if($player = $result->fetch_assoc()) {
				$player = new Player(
					$player['id'],
					$player['firstname'],
					$player['name'],
					new DateTime($player['birthday']),
					$player['gender']
				);

				parent::render(new PlayerView($player));
			}

			$result->free();
		}

		return parent::OK;
	}
}
