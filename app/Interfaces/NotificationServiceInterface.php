<?php

namespace App\Interfaces;

interface NotificationServiceInterface
{
    /**
     * Send a notification
     *
     * @param mixed $notifiable
     * @param string $message
     * @param string $subject
     * @param array $data
     * @return bool
     */
    public function send($notifiable, string $message, string $subject = '', array $data = []): bool;

    /**
     * Get the notification channel
     *
     * @return string
     */
    public function getChannel(): string;

    /**
     * Get the notification provider
     *
     * @return string
     */
    public function getProvider(): string;
}
