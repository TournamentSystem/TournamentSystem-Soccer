<?php

namespace TournamentSystem\View;

use TournamentSystem\Model\Tournament;

class TournamentView extends View {
	private Tournament $tournament;
	
	public function __construct(Tournament $tournament) {
		parent::__construct($tournament->name, 'tournament');
		
		$this->tournament = $tournament;
	}
	
	public function render(): void {
		parent::renderView('templates/tournament.latte', [
			'tournament' => $this->tournament
		]);
	}
}
