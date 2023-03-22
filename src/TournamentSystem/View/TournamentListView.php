<?php

namespace TournamentSystem\View;

use DateTime;
use TournamentSystem\Model\Tournament;

class TournamentListView extends View {
	/**
	 * @var array<string, Tournament[]>
	 */
	private array $tournaments = [];
	private string $year;

	/**
	 * @param Tournament[] $tournaments
	 */
	public function __construct(array $tournaments = [], string $year = null) {
		parent::__construct('Tournament List', 'tournament_list');

		uasort($tournaments, fn($a, $b) => $a->getStart() <=> $b->getStart());
		foreach($tournaments as $tournament) {
			$start_year = $tournament->start->format('Y');
			$end_year = $tournament->end->format('Y');

			if(!array_key_exists($start_year, $this->tournaments)) {
				$this->tournaments[$start_year] = [];
			}

			$this->tournaments[$start_year][] = $tournament;

			if($end_year != $start_year) {
				if(!array_key_exists($end_year, $this->tournaments)) {
					$this->tournaments[$end_year] = [];
				}

				$this->tournaments[$end_year][] = $tournament;
			}
		}
		krsort($this->tournaments);

		$this->year = $year ?? (new DateTime())->format('Y');
	}

	public function render(): void {
		parent::renderView('templates/tournament_list.latte', [
			'tournaments' => $this->tournaments,
			'year' => $this->year
		]);
	}
}
