<?php

namespace TournamentSystem\Controller\Soccer;

use TournamentSystem\Controller\Controller;
use TournamentSystem\Model\Club;
use TournamentSystem\View\ClubView;

class ClubController extends Controller {
	
	public function __construct() {
		parent::__construct('SELECT * FROM tournament_club WHERE id=?');
	}
	
	protected function get(): int {
		$this->stmt[0]->bind_param('i', $_REQUEST['id']);
		$this->stmt[0]->execute();
		
		if($result = $this->stmt[0]->get_result()) {
			if($club = $result->fetch_assoc()) {
				$club = new Club(
					$club['id'],
					$club['name']
				);
				
				parent::render(new ClubView($club));
			}
			
			$result->free();
		}
		
		return parent::OK;
	}
}
