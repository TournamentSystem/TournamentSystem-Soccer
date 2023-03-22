<?php

namespace TournamentSystem\Module;

use TournamentSystem\Controller\Controller;
use TournamentSystem\Controller\Soccer\ClubController;
use TournamentSystem\Controller\Soccer\CoachController;
use TournamentSystem\Controller\Soccer\PlayerController;
use TournamentSystem\Controller\Soccer\TournamentController;
use TournamentSystem\Controller\Soccer\TournamentListController;
use TournamentSystem\Database\Database;
use TournamentSystem\Model\Club;
use TournamentSystem\Model\Coach;
use TournamentSystem\Model\Player;
use TournamentSystem\Model\Tournament;

class Soccer extends Module {

	public function handle(array $page): ?Controller {
		if($page[0] === '') {
			return new TournamentListController();
		}
		if($page[0] === 'player' && is_numeric($page[1])) {
			self::set('id', $page[1]);

			return new PlayerController();
		}
		if($page[0] === 'coach' && is_numeric($page[1])) {
			self::set('id', $page[1]);

			return new CoachController();
		}
		if($page[0] === 'club' && is_numeric($page[1])) {
			self::set('id', $page[1]);

			return new ClubController();
		}
		if(is_numeric($page[0])) {
			self::set('id', $page[0]);

			return new TournamentController();
		}

		return null;
	}

	public function initDatabase(Database $db): void {
		$db->createTable(Tournament::class);
		$db->createTable(Player::class);
		$db->createTable(Coach::class);
		$db->createTable(Club::class);
	}

	public function deinitDatabase(Database $db): void {
		// TODO: Implement deinitDatabase() method.
	}
}
