<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\WantedManager;

class WantedController  extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function wanted()
    {
        $wantedManager = new WantedManager();
        $cities = $wantedManager->getCities();

        return $this->twig->render('Home/wanted.html.twig', [
            'cities' => $cities,
        ]);
    }
}
