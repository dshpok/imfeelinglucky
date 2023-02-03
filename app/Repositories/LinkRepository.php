<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Link;
use mysql_xdevapi\Collection;

class LinkRepository
{
    /**
     * @param int $userId
     * @param string $linkString
     * @return void
     */
    public function create(int $userId, string $linkString): void
    {
        $link = new Link();
        $link->link = $linkString;
        $link->user_id = $userId;
        $link->is_active = true;
        $link->save();
    }

    /**
     * @param int $userId
     * @param string $linkString
     * @return void
     *
     */
    public function update(int $userId, string $linkString): void
    {
        $link = Link::where('user_id', '=', $userId)
            ->first();
        $link->link = $linkString;
        $link->is_active = true;
        $link->save();
    }

    public function deactivate(string $link, int $userId): void
    {
        $link = Link::where('link', '=', $link)
            ->where('user_id', '=', $userId)
            ->first();
        $link->is_active = false;
        $link->save();
    }

    /**
     * @param string $link
     * @return Link|null
     */
    public function get(string $link): ?Link
    {
        return Link::where('link', '=', $link)
            ->where('is_active', '=', true)
            ->where('created_at', '>=', now()->subDays(7))
            ->first();
    }


    private function generateLink(): string
    {
        return hash('sha256', random_bytes(18));
    }
}
