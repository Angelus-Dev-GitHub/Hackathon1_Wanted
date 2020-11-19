<?php


namespace App\Controller;



use App\Model\MapManager;
use http\Env\Response;

class MapController extends AbstractController
{
    public function Show($id)
    {
        $newMapManager = new MapManager();
        $positions = $newMapManager->read($id);
        return $this->twig->render('Test/map.html.twig', [
            'positions' => $positions
        ]);
    }







}