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

//        $result = null;

        // Phone number

        $phone = $message->getPhone();

        $phone = str_split($phone);

        $newCount = 1;
        $resultPhone = '';

        $otherPart = '';

        for ($i = count($phone); $i >= 0; $i--)
        {
//            echo "\n";
//            echo $newCount;

            if ($newCount === 3 || $newCount === 5) {
                $resultPhone .= '-' . implode(array_slice($phone, $i, 2), '');
            } elseif ($newCount === 8) {
                $resultPhone .= '-' . implode(array_slice($phone, $i, 3), '');
            }

            if ($newCount > 8) {
                $otherPart .= implode(array_slice($phone, 0, $i + 1), '');
                break;
            }

            $newCount++;
        }

        $result = implode("-", array_reverse(explode("-", $resultPhone)));

        if ($result[strlen($result) - 1] === '-') {
            $result = substr($result, 0, -1);
        }

        $fullResult = $otherPart . ' ' . $result;

//        /** @var OrderDTO $message */
//        if (preg_match('/^(\+375|80)(29|25|44|33)(\d{3})(\d{2})(\d{2})$/', $message->getPhone(), $matches)) {
//            $result = $matches[1] . ' ' . $matches[2] . ' ' . $matches[3] . '-' . $matches[4] . '-' . $matches[5];
//
//            if ($matches[1] != '+375') {
//                $result = $matches[1] . $matches[2] . ' ' . $matches[3] . '-' . $matches[4] . '-' . $matches[5];
//            }
//        } else {
//            $result = $message->getPhone();
//        }


        $this->client->sendMessage([
            'chat_id' => self::CHAT_ID,
            'text' => "Новый заказ:  Имя: " . $message->getFullName() . ". Номер телефона: " . $fullResult . ". Комментарий: " . $message->getComment() . ". Страница: " . $message->getPageTitle()
        ]);

        if ($message->getFileType() && ((string) $message->getFileType() === 'docx' || (string) $message->getFileType() === 'pdf' || (string) $message->getFileType() === 'pdf')) {
            $this->client->sendDocument([
                'chat_id' => self::CHAT_ID,
                'document' => InputFile::create($message->getFile(), 'Document.' . $message->getFileType()),
                'caption' => 'Прикрепленный документ',
            ]);
        } else {
            $this->client->sendPhoto([
                'chat_id' => self::CHAT_ID,
                'photo' => InputFile::create($message->getFile())
            ]);
        }
    }
}
