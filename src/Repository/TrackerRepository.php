<?php


namespace App\Repository;


use Symfony\Contracts\HttpClient\HttpClientInterface;

class TrackerRepository
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     */
    public function findByActuallyDate(): array
    {
        $response = $this->client->request(
            'GET',
            'https://coronavirusapifr.herokuapp.com/data/live/france'
        );
        $content = $response->getContent();
        $content = $response->toArray();
        return $content['0'];
    }

    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     */
    public function findAllDepartments(): array
    {
        $response = $this->client->request(
            'GET',
            'https://coronavirusapifr.herokuapp.com/data/live/departements'
        );
        $content = $response->getContent();
        $content = $response->toArray();
        return $content;
    }

    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     */
    public function findByDate($date): array
    {
        $response = $this->client->request(
            'GET',
            'https://coronavirusapifr.herokuapp.com/data/france-by-date/' . $date
        );
        $content = $response->getContent();
        $content = $response->toArray();
        return $content;
    }

    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     */
    public function showAllDetailByDepartement($department): array
    {
        $response = $this->client->request(
            'GET',
            'https://coronavirusapifr.herokuapp.com/data/live/departement/' . $department
        );
        $content = $response->getContent();
        $content = $response->toArray();
        return $content['0'];
    }

//    /**
//     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
//     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
//     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
//     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
//     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
//     */
//    public function findByRegion($region): array
//    {
//        $response = $this->client->request(
//            'GET',
//            'https://coronavirusapifr.herokuapp.com/data/live/region/' . $region
//        );
//        $content = $response->getContent();
//        $content = $response->toArray();
//        return $content['0'];
//    }


}