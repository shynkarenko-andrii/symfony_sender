<?php

namespace App\Controller;

use App\Entity\UserChannelSettings;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserChannelSettingsController extends AbstractController
{
    /**
     * @Route("/user_channel_settings", name="user_channel_settings_index", methods={"GET"})
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(UserChannelSettings::class);
        $userChannelSettings = $repository->findAll();

        return $this->render('user_channel_settings/index.html.twig', [
            'userChannelSettings' => $userChannelSettings,
        ]);
    }

    /**
     * @Route("/user_channel_settings/{id}/toggle", name="user_channel_settings_toggle", methods={"POST"})
     */
    public function toggle(Request $request, UserChannelSettings $userChannelSettings): Response
    {
        $newStatus = !$userChannelSettings->getIsActive();
        $userChannelSettings->setIsActive($newStatus);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->flush();

        return $this->redirectToRoute('user_channel_settings_index');
    }
}
