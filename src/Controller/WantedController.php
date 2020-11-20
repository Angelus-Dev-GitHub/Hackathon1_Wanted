<?php
/**
 * Created by PhpStorm.
 * User: aurelwcs
 * Date: 08/04/19
 * Time: 18:40
 */

namespace App\Controller;

use App\Model\CityManager;
use App\Model\MapManager;
use App\Model\WantedManager;
use Nette\DI\Definitions\LocatorDefinition;

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
                'city_id' => intval($_POST['city']),
                'created_at' => $date,
            ];
            $cityManager = new CityManager();
            $cityManager->addCityForWanted($newCity, $id);
        }

        $newMapManager = new MapManager();
        $positions = $newMapManager->read($id);

        return $this->twig->render('Home/wanted.html.twig', [
            'wanted' => $wanted,
            'cities' => $cities,
            'positions' => $positions
        ]);
    }

    public function add()
    {
        $wanted = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $wanted = [
                'name' => $_POST['name'],
                'descriptif' => $_POST['descriptif'],
                'reward' => intval($_POST['reward']),
                'picture' => $_POST['picture'],
            ];

            $newWantedManager = new WantedManager();
            $id = $newWantedManager->addNewWanted($wanted);
            header('Location: /wanted/show/' . $id);

        }
    }
}
