<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\LinkRepository;
use Ramsey\Uuid\Uuid;
use App\Interfaces\LinkInterface;

class LinkService Implements LinkInterface
{
    /**
     * @param LinkRepository $linkRepository
     */
    public function __construct(
        private LinkRepository $linkRepository
    ) {
    }

    /**
     * @param int $userId
     * @param string $link
     * @return void
     */
    public function create(int $userId, string $link): void
    {
        $this->linkRepository->create($userId, $link);

    }

    /**
     * @param int $userId
     * @return string
     */
    public function update(int $userId): string
    {   $link = $this->generateLink();
        $this->linkRepository->update($userId, $link);
        return $link;
    }

    /**
     * @param string $link
     * @param int $userId
     * @return void
     */
    public function deactivate(string $link, int $userId): void
    {
        $this->linkRepository->deactivate($link, $userId);
    }

    /**
     * @param string $linkString
     * @return string|null
     */
    public function get(string $linkString): ?string
    {
        $link =  $this->linkRepository->get($linkString);
        if ($link === null) {
            return null;
        }
        session()->put('userId', $link->user->getId());

        return $link->link;
    }

    /**
     * @return string
     */
    public function generateLink(): string
    {
        return Uuid::uuid4()->toString();
    }
}
