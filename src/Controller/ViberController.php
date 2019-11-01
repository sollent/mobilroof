<?php

namespace App\Controller;

use App\Message\ViberNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Viber\Api\Exception\ApiException;
use Viber\Api\Sender;
use Viber\Client;

/**
 * Class ViberController
 * @package App\Controller
 */
class ViberController extends AbstractController
{
    /**
     * @Route(
     *     "/send-message"
     * )
     *
     * @param Request $request
     */
    public function eventCreateAction(Request $request)
    {
//        $this->dispatchMessage(new ViberNotification('Привеееет!!!'));
        $apiKey = '4a89ee2bfe27d633-5b00caedd2d50e09-71aa79f3c8acdc93'; // from "Edit Details" page
        $webhookUrl = 'https://api.einstein.by/send-message'; // for exmaple https://my.com/bot.php

        try {
            $client = new Client([ 'token' => $apiKey ]);
            $result = $client->setWebhook($webhookUrl);
            echo "Success!\n";
        } catch (\Exception $e) {
            echo "Error: ". $e->getMessage() ."\n";
        }

        $botSender = new Sender([
            'name' => 'Reply bot',
            'avatar' => 'https://developers.viber.com/img/favicon.ico',
        ]);

        $client->sendMessage((new \Viber\Api\Message\Text())
            ->setSender($botSender)
            ->setText('ddadsdas'));
    }
}