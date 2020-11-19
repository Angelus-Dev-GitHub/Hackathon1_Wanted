<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\CityManager;
use App\Model\WantedManager;

class WantedController extends AbstractController
{

    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function show($id)
    {
        $wantedManager = new WantedManager();
        $cities = $wantedManager->getCities();

        $wantedManager = new WantedManager();
        $wanted = $wantedManager->selectAllDataOneWantedById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date = date('Y-m-d H:i:s');
            $newCity = [
                'city_id' => $_POST['city'],
                'created_at' => $date,
            ];
            $cityManager = new CityManager();
            $cityManager->addCityForWanted($newCity, $id);
        }

        return $this->twig->render('Home/wanted.html.twig', [
            'wanted' => $wanted,
            'cities' => $cities,
        ]);
    }
}
