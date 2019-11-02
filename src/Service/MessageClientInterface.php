<?php

namespace App\Service;

/**
 * Interface MessageClientInterface
 * @package App\Service
 */
interface MessageClientInterface
{
    /**
     * @param $message
     */
    public function sendMessage($message): void;
}