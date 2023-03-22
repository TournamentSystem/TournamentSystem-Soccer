<?php

namespace TournamentSystem\Model;

use TournamentSystem\Database\Column;

class Club {
	public readonly int $id;
	#[Column(size: 64)]
	public readonly string $name;

	public function __construct(int $id, string $name) {
		$this->id = $id;
		$this->name = $name;
	}
}
