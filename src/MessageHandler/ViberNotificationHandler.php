<?php
//
//namespace App\MessageHandler;
//
//use App\Message\ViberNotification;
//use App\Service\MessageClientInterface;
//use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
//
///**
// * Class ViberNotificationHandler
// * @package App\MessageHandler
// */
//class ViberNotificationHandler implements MessageHandlerInterface
//{
//    /**
//     * @var MessageClientInterface
//     */
//    private $viberService;
//
//    /**
//     * ViberNotificationHandler constructor.
//     * @param MessageClientInterface $viberService
//     */
//    public function __construct(MessageClientInterface $viberService)
//    {
//        $this->viberService = $viberService;
//    }
//
//    /**
//     * @param ViberNotification $message
//     */
//    public function __invoke(ViberNotification $message)
//    {
//        $this->viberService->sendMessage($message->getContent());
//    }
//}