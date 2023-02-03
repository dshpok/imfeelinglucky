<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\PlayResultRepository;
use App\Services\DTO\PlayResultDTO;
use \Illuminate\Support\Collection;
use App\Interfaces\PlayResultInterface;

class PlayResultService Implements PlayResultInterface
{
    /**
     * @var int
     */
    private const MIN_NUMBER = 0;
    /**
     * @var int
     */
    private const MAX_NUMBER = 1000;

    /**
     * @param PlayResultRepository $playResultRepository
     * @param PlayResultDTO $dto
     */
    public function __construct(
        private PlayResultRepository $playResultRepository,
        private PlayResultDTO $dto,
    ) {
    }

    /**
     * @param int $userId
     * @return PlayResultDTO
     * @throws \Exception
     */
    public function play(int $userId): PlayResultDTO
    {
        $randomNumber = $this->getRandomNumber();
        $isWin = $this->getIsWin($randomNumber);
        $winSum = $isWin ? $this->getWinSum($randomNumber) : 0;

        $this->dto->setRandomNumber($randomNumber)
            ->setUserId($userId)
            ->setIsWin($isWin)
            ->setWinSum($winSum);

        $this->playResultRepository->setResult($this->dto);

        return $this->dto;
    }

    /**
     * @param int $userId
     * @return Collection
     */
    public function getHistory(int $userId): Collection
    {
        return $this->playResultRepository->getHistory($userId);
    }

    /**
     * @return int
     * @throws \Exception
     */
    private function getRandomNumber(): int
    {
        return random_int(self::MIN_NUMBER, self::MAX_NUMBER);
    }

    /**
     * @param int $number
     * @return int
     */
    private function getWinSum(int $number): int
    {
        $result = match (true) {
            $number > 900 => $number * 0.7,
            $number > 600 && $number <= 900 => $number * 0.5,
            $number > 300 && $number <= 600 => $number * 0.3,
            default => $number * 0.1
        };

        return (int)$result;
    }

    /**
     * @param int $number
     * @return bool
     */
    private function getIsWin(int $number): bool
    {
        return $number % 2 === 0;
    }
}
