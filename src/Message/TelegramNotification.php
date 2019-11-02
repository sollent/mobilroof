<?php

namespace App\Message;

use App\DTO\Mobilroof\OrderDTO;

/**
 * Class TelegramNotification
 * @package App\Message
 */
class TelegramNotification
{
    /**
     * @var OrderDTO
     */
    private $content;

    /**
     * TelegramNotification constructor.
     * @param OrderDTO $message
     */
    public function __construct(OrderDTO $message)
    {
        $this->content = $message;
    }

    /**
     * @return OrderDTO
     */
    public function getContent(): OrderDTO
    {
        return $this->content;
    }
}