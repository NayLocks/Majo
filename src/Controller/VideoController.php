<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Videos;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class VideoController extends AbstractController
{
    /**
     * @Route("/video/{id}", name="video")
     */
    public function index(Request $request, $id)
    {

        $allVideos = $this->getDoctrine()->getRepository(Videos::class);
        $video = $allVideos->findOneBy(array('id' => $id));

        $allComments = $this->getDoctrine()->getRepository(Comment::class);
        $comments = $allComments->findBy(array('video' => $video), array('date' => 'ASC'));
        $nbComment = $allComments->nbComment($id);

        return $this->render('training.html.twig', ['video' => $video, 'comments' => $comments, 'nbComment' => $nbComment[0]['nb']]);
    }
}

