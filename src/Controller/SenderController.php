<?php

// src/Controller/SenderController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SenderController extends AbstractController
{
    /**
     * @Route("/channels", name="sender_channels")
     */
    #[Route('/channels')]
    public function channels(): Response
    {
        $channels = ['Email', 'SMS', 'WebPush', 'Telegram']; // Список каналов

        return $this->render('sender/channels.html.twig', [
            'channels' => $channels,
        ]);
    }

    /**
     * @Route("/channels/settings", name="sender_channels_settings")
     */
    public function channelsSettings(Request $request): Response
    {
        // Создаем экземпляр формы
        $form = $this->createForm(ChannelsSettingsForm::class);

        // Обрабатываем отправку формы
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Действия при сохранении формы (например, сохранение настроек в базе данных)
            // Это место, где вы должны обновить настройки пользователя и сохранить их
            // Ваш код здесь
        }

        return $this->render('form/channels_settings_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

