<?php

declare(strict_types=1);

namespace App\Services\DTO;

class PlayResultDTO
{
    /**
     * @var int
     */
    public int $userId = 0;
    /**
     * @var int
     */
    public int $random_number = 0;
    /**
     * @var int
     */
    public int $winSum = 0;
    /**
     * @var bool
     */
    public bool $isWin = false;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return PlayResultDTO
     */
    public function setUserId(int $userId): PlayResultDTO
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return int
     */
    public function getRandomNumber(): int
    {
        return $this->random_number;
    }

    /**
     * @param int $random_number
     * @return PlayResultDTO
     */
    public function setRandomNumber(int $random_number): PlayResultDTO
    {
        $this->random_number = $random_number;
        return $this;
    }

    /**
     * @return int
     */
    public function getWinSum(): int
    {
        return $this->winSum;
    }

    /**
     * @param int $winSum
     * @return PlayResultDTO
     */
    public function setWinSum(int $winSum): PlayResultDTO
    {
        $this->winSum = $winSum;
        return $this;
    }

    /**
     * @return bool
     */
    public function isWin(): bool
    {
        return $this->isWin;
    }

    /**
     * @param bool $isWin
     * @return PlayResultDTO
     */
    public function setIsWin(bool $isWin): PlayResultDTO
    {
        $this->isWin = $isWin;
        return $this;
    }
}
