<?php

namespace Feature;

interface TennisGame
{
    /**
     * @param  $playerName
     * @return void
     */
    public function quantifyWinningPointForPlayer(String $playerName): void;

    /**
     * @return string
     */
    public function getGameScoreboard(): string;
}
