<?php

namespace TournamentSystem\Controller\Soccer;

use DateTime;
use TournamentSystem\Controller\Controller;
use TournamentSystem\Model\Tournament;
use TournamentSystem\View\TournamentListView;

class TournamentListController extends Controller {
	
	public function __construct() {
		parent::__construct('SELECT * FROM tournament_tournament');
	}
	
	protected function get(): int {
		$this->stmt[0]->execute();
		
		if($result = $this->stmt[0]->get_result()) {
			$tournaments = [];
			
			foreach($result->fetch_all(MYSQLI_ASSOC) as $tournament) {
				$tournaments[] = new Tournament(
					$tournament['id'],
					$tournament['name'],
					$tournament['description'],
					new DateTime($tournament['start']),
					new DateTime($tournament['end']),
					$tournament['owner']
				);
			}
			
			parent::render(new TournamentListView($tournaments, $_REQUEST['year'] ?? null));
			$result->free();
		}
		
		return parent::OK;
	}
	
	protected function post(): int {
		return self::get();
	}
}
