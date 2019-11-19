<?php

namespace App\Service;

use App\DTO\Mobilroof\OrderDTO;
use Telegram\Bot\Api;
use Telegram\Bot\FileUpload\InputFile;

/**
 * Class TelegramService
 * @package App\Service
 */
class TelegramService implements MessageClientInterface
{
    private const API_KEY = '1054186778:AAG15dlprQYmNymRd5iwEILwkIKJJbNFvog';

    private const CHAT_ID = -1001230800675;

    /**
     * @var Api
     */
    private $client;

    /**
     * @param string $message
     * @throws \Telegram\Bot\Exceptions\TelegramSDKException
     */
    public function sendMessage($message): void
    {
        $this->client = new Api(self::API_KEY);

        /** @var OrderDTO $message */
        $this->client->sendMessage([
            'chat_id' => self::CHAT_ID,
            'text' => "Новый заказ:  Имя: " . $message->getFullName() . ". Номер телефона: " . $message->getPhone() . ". Комментарий: " . $message->getComment() . ". Страница: " . $message->getPageTitle()
        ]);

        if ($message->getFile() !== null) {
            $this->client->sendPhoto([
                'chat_id' => self::CHAT_ID,
                'photo' => InputFile::create($message->getFile())
            ]);
        }
    }
}
