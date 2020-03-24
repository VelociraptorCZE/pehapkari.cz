<?php

declare(strict_types=1);

namespace Pehapkari\Blog\Posts\Year2016\EventDispatcher\Event;

use Symfony\Contracts\EventDispatcher\Event;

final class YoutuberNameEvent extends Event
{
    private string $youtuberName;

    public function __construct(string $youtuberName)
    {
        $this->youtuberName = $youtuberName;
    }

    public function getYoutuberName(): string
    {
        return $this->youtuberName;
    }
}
