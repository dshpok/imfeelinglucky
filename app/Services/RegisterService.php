<?php

declare(strict_types=1);

namespace App\Services;

use App\Interfaces\LinkInterface;
use App\Interfaces\RegisterInterface;
use App\Repositories\RegisterRepository;

class RegisterService implements RegisterInterface
{
    /**
     * @param RegisterRepository $registerRepository
     * @param LinkInterface $linkService
     */
    public function __construct(
        private RegisterRepository $registerRepository,
        private LinkInterface $linkService,
    ) {
    }

    /**
     * @param string $name
     * @param string $phoneNumber
     * @return string
     */
    public function create(string $name, string $phoneNumber): string
    {
        $userId = $this->registerRepository->create($name, $phoneNumber);
        session()->put('user_id', $userId);
        $link = $this->linkService->generateLink();
        $this->linkService->create($userId, $link);

        return $link;
    }
}
