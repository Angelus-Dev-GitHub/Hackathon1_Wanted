<?php


namespace App\Controller;


use App\Model\SearchManager;

class SearchController extends AbstractController
{
    public function show()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['search'];
            $searchManager = new SearchManager();
            $wantedFound = $searchManager->selectByWordKey($name);

            return $this->twig->render('Home/search.html.twig', [
                'wantedFound' => $wantedFound
            ]);

        } else {
            header("location: /");
        }
    }
}