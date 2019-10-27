<?php

namespace App\Controller;

use App\Message\ViberNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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
        $this->dispatchMessage(new ViberNotification('Привеееет!!!'));
    }
}