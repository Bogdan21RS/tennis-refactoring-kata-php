<?php

namespace Feature;

class TennisGame1 implements TennisGame
{
    private int $player1Score = 0;
    private int $player2Score = 0;
    private string $player1Name;
    private string $player2Name;

    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }

    public function quantifyWinningPointForPlayer(String $playerName): void
    {
        $this->isPlayerOne($playerName)
            ? $this->player1Score++
            : $this->player2Score++;
    }

    public function getGameScoreboard(): string
    {
        $scoreBoard = "";
        if ($this->player1Score == $this->player2Score) {
            switch ($this->player1Score) {
                case 0:
                    $scoreBoard = "Love-All";
                    break;
                case 1:
                    $scoreBoard = "Fifteen-All";
                    break;
                case 2:
                    $scoreBoard = "Thirty-All";
                    break;
                default:
                    $scoreBoard = "Deuce";
                    break;
            }
        } elseif ($this->player1Score >= 4 || $this->player2Score >= 4) {
            $minusResult = $this->player1Score - $this->player2Score;
            if ($minusResult == 1) {
                $scoreBoard = "Advantage player1";
            } elseif ($minusResult == -1) {
                $scoreBoard = "Advantage player2";
            } elseif ($minusResult >= 2) {
                $scoreBoard = "Win for player1";
            } else {
                $scoreBoard = "Win for player2";
            }
        } else {
            for ($currentPlayer = 1; $currentPlayer < 3; $currentPlayer++) {
                if ($currentPlayer == 1) {
                    $tempScore = $this->player1Score;
                } else {
                    $scoreBoard .= "-";
                    $tempScore = $this->player2Score;
                }
                switch ($tempScore) {
                    case 0:
                        $scoreBoard .= "Love";
                        break;
                    case 1:
                        $scoreBoard .= "Fifteen";
                        break;
                    case 2:
                        $scoreBoard .= "Thirty";
                        break;
                    case 3:
                        $scoreBoard .= "Forty";
                        break;
                }
            }
        }
        return $scoreBoard;
    }

    private function isPlayerOne(String $playerName) : bool
    {
        return $playerName === $this->player1Name;
    }
}

