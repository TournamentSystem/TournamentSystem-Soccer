<?php

namespace TournamentSystem\Model;

use DateTime;
use TournamentSystem\Database\Column;

class Tournament {
	public readonly int $id;
	#[Column(size: '64')]
	public readonly string $name;
	#[Column(size: '256')]
	public readonly string $description;
	public readonly DateTime $start;
	public readonly DateTime $end;
	public readonly User $owner;

	public function __construct(int $id, string $name, ?string $description, DateTime $start, DateTime $end, User $owner) {
		$this->id = $id;
		$this->name = $name;
		$this->description = $description ?? '';
		$this->start = $start;
		$this->end = $end;
		$this->owner = $owner;
	}
}
