<?php

namespace App\Controller;

use App\Services\AntiSpamAlert;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @route("/hello-world", name="hello-world", methods={"GET"})
     */
    public function helloWord(): Response
    {
        return new Response('<h1>Hello World</h1>');
    }

    /**
     * @route("/hello-world/{name}", name="hello-world-name", methods={"GET"})
     */
    public function helloWorldWithArguments(AntiSpamAlert $antiSpamAlert, $name): Response
    {
        $content = '<h1>Hello ' . ucfirst($name) . '</h1>';
        if ($antiSpamAlert->isSpam($name)) {
            $antiSpamAlert->alert($name);
            $content = '<h1>[SPAM] Hello ' . ucfirst($name) . '</h1>';
        }
        return new Response($content);
    }
}
