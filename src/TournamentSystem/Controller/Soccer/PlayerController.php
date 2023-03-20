<?php

namespace TournamentSystem\Controller;

use DateTime;
use TournamentSystem\Model\Player;
use TournamentSystem\View\PlayerView;

class PlayerController extends Controller {
	
	public function __construct() {
		parent::__construct('SELECT * FROM tournament_player NATURAL JOIN tournament_person WHERE id=?');
	}
	
	protected function get(): int {
		$this->stmt->bind_param('i', $_REQUEST['id']);
		$this->stmt->execute();
		
		if($result = $this->stmt->get_result()) {
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
