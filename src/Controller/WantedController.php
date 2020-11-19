<?php


namespace App\Controller;


use App\Model\WantedManager;

class WantedController extends AbstractController
{
    public function selectAll ()
    {
        $wantedManager = new WantedManager();
        $wanted = $wantedManager->getWanted();

        return $this->twig->render('Home/index.html.twig', ['wanted' => $wanted]);
    }
}