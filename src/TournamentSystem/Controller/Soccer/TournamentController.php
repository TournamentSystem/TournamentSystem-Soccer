<?php

namespace TournamentSystem\Controller\Soccer;

use DateTime;
use TournamentSystem\Controller\Controller;
use TournamentSystem\Model\Tournament;
use TournamentSystem\View\TournamentView;

class TournamentController extends Controller {
	
	public function __construct() {
		parent::__construct('SELECT * FROM tournament_tournament WHERE id=?');
	}
	
	protected function get(): int {
		$this->stmt[0]->bind_param('i', $_REQUEST['id']);
		$this->stmt[0]->execute();
		
		if($result = $this->stmt[0]->get_result()) {
			if($tournament = $result->fetch_assoc()) {
				$tournament = new Tournament(
					$tournament['id'],
					$tournament['name'],
					$tournament['description'],
					new DateTime($tournament['start']),
					new DateTime($tournament['end']),
					$tournament['owner']
				);
				
				parent::render(new TournamentView($tournament));
			}
			
			$result->free();
		}
		
		return parent::OK;
	}
}
