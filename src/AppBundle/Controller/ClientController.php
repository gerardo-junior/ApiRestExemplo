<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;


class ClientController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  description="Get all brands"
     * )
     *
     * @Route("/brands", name="brands")
     * @Method({"GET"})
     */
    public function getBrands()
    {
        $response = $this->get('client')->getBrands();
        $view = $this->view($response, $response['meta']['code']);
        return $this->handleView($view);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="Register client",
     *  filters={
     *      {"name"="name", "dataType"="string"},
     *      {"name"="email", "dataType"="string"},
     *      {"name"="data_of_birth", "dataType"="datetime"},
     *      {"name"="phone", "dataType"="string"},
     *      {"name"="cpf", "dataType"="integer"},
     *      {"name"="zipcode", "dataType"="integer"},
     *      {"name"="brand_id", "dataType"="integer"}
     *  }
     * )
     *
     * @Route("/client", name="client.register")
     * @Method({"POST"})
     */
    public function registerClient(Request $request)
    {
        $response = $this->get('client')->registerClient($request);
        $view = $this->view($response, $response['meta']['code']);
        return $this->handleView($view);
    }
}