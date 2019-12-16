<?php

namespace App\Controller;

use App\DTO\Mobilroof\OrderDTO;
use App\Form\Mobilroof\OrderForm;
use App\Message\TelegramNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TelegramController
 * @package App\Controller
 */
class TelegramController extends AbstractController
{
    /**
     * @Route(
     *     "/save-order"
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $orderDTO = new OrderDTO();
        $form = $this->createForm(OrderForm::class, $orderDTO);

        $file = $request->files->get("file");
        $extension = $file->guessExtension();

        var_dump($extension);exit();

        $form->get('fileType')->setData($extension);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $this->dispatchMessage(new TelegramNotification($form->getData()));

            return new JsonResponse(['message' => 'Notifications have been sent']);
        }
    }
}
