<?php

declare(strict_types=1);

namespace App\Interfaces;

interface LinkInterface
{
    /**
     * @param int $userId
     * @param string $link
     * @return void
     */
    public function create(int $userId, string $link): void;

    /**
     * @param int $userId
     * @return string
     */
    public function update(int $userId): string;

    /**
     * @param string $link
     * @param int $userId
     * @return void
     */
    public function deactivate(string $link, int $userId): void;

    /**
     * @param string $link
     * @return string|null
     */
    public function get(string $link);//: ?string;

    /**
     * @return string
     */
    public function generateLink(): string;
}
