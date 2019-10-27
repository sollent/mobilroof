<?php

namespace App\Service;


use Exception;
use Viber\Api\Message;
use Viber\Api\Sender;
use Viber\Bot;
use Viber\Client;

class ViberClientService implements MessageClientInterface
{
    private const apiKey = '4a7808342d67d79f-ce040566e89a60fd-cafc75380821a4c3';

    /**
     * @var string
     */
    private $webhookUrl;

    /**
     * @var Client
     */
    private $client;

    /**
     * ViberClientService constructor.
     */
    public function __construct()
    {
        $this->webhookUrl = 'http://localhost:8000/send-message';
        $this->subscribe();
    }


    /**
     * @param string $message
     */
    public function sendMessage(string $message): void
    {
        $botSender = new Sender([
            'name' => 'Reply bot',
            'avatar' => 'https://developers.viber.com/img/favicon.ico',
        ]);
//
//        try {
//            $bot = new Bot([ 'token' => self::apiKey ]);
//            $bot
//                ->onText('|.*|s', function ($event) use ($bot) {
//                    // .* - match any symbols (see PCRE)
//                    $bot->getClient()->sendMessage(
//                        (new \Viber\Api\Message\Text())
//                            ->setSender($botSender)
//                            ->setReceiver($event->getSender()->getId())
//                            ->setText($message)
//                    );
//                })
//                ->run();
//        } catch (Exception $e) {
//            // todo - log errors
//        }

        $this->client->sendMessage((new \Viber\Api\Message\Text())
            ->setSender($botSender)
            ->setText($message));
    }

    public function subscribe(): void
    {
        try {
            $this->client = new Client([ 'token' => self::apiKey ]);
            $result = $this->client->setWebhook($this->webhookUrl);
            echo "Success!\n";
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage() ."\n";
        }
    }
}