<?php

// src/Controller/Api/ChannelsSettingsApiController.php

namespace App\Controller\Api;

use App\Form\ChannelsSettingsForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChannelsSettingsApiController extends AbstractController
{
    /**
     * @Route("/api/channels/settings", name="api_sender_channels_settings", methods={"POST"})
     */
    public function channelsSettingsApi(Request $request): Response
    {
        // Создаем экземпляр формы
        $form = $this->createForm(ChannelsSettingsForm::class);

        // Обрабатываем JSON данные запроса
        $data = json_decode($request->getContent(), true);
        $form->submit($data);

        if ($form->isSubmitted() && $form->isValid()) {
            // Действия при сохранении формы (например, сохранение настроек в базе данных)
            // Ваш код здесь

            return new JsonResponse(['message' => 'Настройки сохранены'], Response::HTTP_OK);
        }

        // В случае ошибок валидации формы
        $errors = [];
        foreach ($form->getErrors(true) as $error) {
            $errors[] = $error->getMessage();
        }

        return new JsonResponse(['errors' => $errors], Response::HTTP_BAD_REQUEST);
    }
}
