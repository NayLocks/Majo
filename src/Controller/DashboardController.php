<?php

namespace App\Controller;

use App\Entity\Videos;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="dashboard")
     */
    public function index(Request $request)
    {

        $allVideos = $this->getDoctrine()->getRepository(Videos::class);
        $videos = $allVideos->findAll();

        return $this->render('videos.html.twig', ['videos' => $videos]);
    }
}

