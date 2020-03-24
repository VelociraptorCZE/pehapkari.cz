<?php

declare(strict_types=1);

namespace Pehapkari\Blog\Posts\Year2016\EventDispatcher\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class NotifyMeOnVideoPublishedEventSubscriber implements EventSubscriberInterface
{
    private bool $isUserNotified = false;

    /**
     * @return string[]
     */
    public static function getSubscribedEvents(): array
    {
        return ['youtube.newVideoPublished' => 'notifyUserAboutVideo'];
    }

    public function notifyUserAboutVideo(): void
    {
        $this->isUserNotified = true;
    }

    public function isUserNotified(): bool
    {
        return $this->isUserNotified;
    }
}
