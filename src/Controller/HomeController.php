<?php

namespace App\Controller;
use App\Entity\Optreden;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="Default")
     */
    public function index()
    {
        $optredens = $this->getDoctrine()
            ->getRepository(Optreden::class)
            ->getAllOptreden();


        $optredensAlGeweest = $this->getDoctrine()
            ->getRepository(Optreden::class)
            ->getOptredenAlGeweest();


        $optredenKomend = $this->getDoctrine()
            ->getRepository(Optreden::class)
            ->getOptredenKomendeWeek();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController', 'optredens' => $optredens, 'optredensAlGeweest' => $optredensAlGeweest, 'optredenKomend' => $optredenKomend
        ]);
    }
}
