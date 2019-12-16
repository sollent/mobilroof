<?php

namespace App\Controller;

use App\DTO\Mobilroof\OrderDTO;
use App\Form\Mobilroof\OrderForm;
use App\Message\TelegramNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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

        /** @var UploadedFile $file */
        $file = $request->files->get("file");
        $extension = $file->guessExtension();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            /** @var OrderDTO $orderDTO */
            $orderDTO = $form->getData();
            $orderDTO->setFileType($extension);
            $orderDTO->setFilename($file->getClientOriginalName());

            var_dump($orderDTO);exit();

            $this->dispatchMessage(new TelegramNotification($orderDTO));

            return new JsonResponse(['message' => 'Notifications have been sent']);
        }
    }
}
