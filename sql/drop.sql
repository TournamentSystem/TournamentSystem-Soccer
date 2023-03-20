DROP TABLE IF EXISTS tournament_tournament;
DROP TABLE IF EXISTS tournament_player;
DROP TABLE IF EXISTS tournament_coach;
DROP TABLE IF EXISTS tournament_club;
DROP TABLE IF EXISTS tournament_clubplayer;
DROP TABLE IF EXISTS tournament_team;
DROP TABLE IF EXISTS tournament_teamplayer;
DROP TABLE IF EXISTS tournament_match;
DROP TABLE IF EXISTS tournament_matchplayer;
DROP TABLE IF EXISTS tournament_matchevent;
DROP TABLE IF EXISTS tournament_goal;
DROP TABLE IF EXISTS tournament_substitution;

DROP PROCEDURE IF EXISTS tournament_matchplayer_teamisplaying_proc;
DROP PROCEDURE IF EXISTS tournament_matchplayer_teamcaptain_proc;
DROP PROCEDURE IF EXISTS tournament_substitution_leavingplayer_proc;

DROP TRIGGER IF EXISTS tournament_matchplayer_insert;
DROP TRIGGER IF EXISTS tournament_matchplayer_update;
DROP TRIGGER IF EXISTS tournament_substitution_insert;
DROP TRIGGER IF EXISTS tournament_substitution_update;
