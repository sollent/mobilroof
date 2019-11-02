<?php

namespace App\MessageHandler;

use App\Message\TelegramNotification;
use App\Service\TelegramService;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

/**
 * Class TelegramNotificationHandler
 * @package App\MessageHandler
 */
class TelegramNotificationHandler implements MessageHandlerInterface
{
    /**
     * @var TelegramService
     */
    private $telegramService;

    /**
     * TelegramNotificationHandler constructor.
     * @param TelegramService $telegramService
     */
    public function __construct(TelegramService $telegramService)
    {
        $this->telegramService = $telegramService;
    }

    /**
     * @param TelegramNotification $notification
     * @throws \Telegram\Bot\Exceptions\TelegramSDKException
     */
    public function __invoke(TelegramNotification $notification)
    {
        $content = $notification->getContent();
        $this->telegramService->sendMessage($content);
    }
}