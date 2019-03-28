<?php declare(strict_types=1);

namespace OpenTraining\Controller;

use OpenTraining\Statie\PostsProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class HomepageController extends AbstractController
{
    /**
     * @var mixed[]
     */
    private $organizers;
    /**
     * @var PostsProvider
     */
    private $postsProvider;
    /**
     * @var array
     */
    private $authors;

    /**
     * @param mixed[] $organizers
     * @param mixed[] $authors
     */
    public function __construct(array $organizers, PostsProvider $postsProvider, array $authors)
    {
        $this->organizers = $organizers;
        $this->postsProvider = $postsProvider;
        $this->authors = $authors;
    }

    /**
     * @Route(path="/", name="homepage")
     */
    public function homepage(): Response
    {
        return $this->render('default/homepage.twig', [
            'organizers' => $this->organizers
        ]);
    }

    /**
     * @Route(path="/press", name="homepage")
     */
    public function press(): Response
    {
        return $this->render('homepage/press.twig');
    }

    /**
     * @Route(path="/rss.xml", name="rss")
     */
    public function rss(): Response
    {
        $response = $this->render('homepage/rss.xml.twig', [
            'posts' => $this->postsProvider->provide(),
            'authors' => $this->authors
        ]);

        $response->headers->set('Content-Type', 'xml');

        return $response;
    }
}
