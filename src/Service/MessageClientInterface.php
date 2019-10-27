<?php

namespace App\Service;

/**
 * Interface MessageClientInterface
 * @package App\Service
 */
interface MessageClientInterface
{
    /**
     * @param string $message
     */
    public function sendMessage(string $message): void;

    public function subscribe(): void;
}