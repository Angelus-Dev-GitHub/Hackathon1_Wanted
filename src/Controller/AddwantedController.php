<?php


namespace App\Controller;


use App\Model\WantedManager;

class AddwantedController extends AbstractController
{
    public function show()
    {
        return $this->twig->render('Home/formAdd.html.twig');
    }

    public function add()
    {
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