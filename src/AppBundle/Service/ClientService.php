<?php
/**
 * Created by PhpStorm.
 * User: gerardo
 * Date: 07/11/17
 * Time: 03:03
 */

namespace AppBundle\Service;


use AppBundle\Entity\Client;

class ClientService
{
    private $doctrine;
    private $em;
    private $validator;
    protected $brandRepository;
    protected $clientRepository;

    public function __construct($doctrine, $validator)
    {
        $this->doctrine = $doctrine;
        $this->em = $this->doctrine->getManager();
        $this->validator = $validator;
        $this->brandRepository = $this->em->getRepository('AppBundle:Brand');
        $this->clientRepository = $this->em->getRepository('AppBundle:Client');
    }

    public function getBrands()
    {
        $data = $this->brandRepository->findAll();
        return array('meta' => array('code' => 200),'data' => $data);
    }

    public function registerClient($request)
    {
        $client = new Client();
        $client->setName($request->get('name', ''));
        $client->setEmail($request->get('email', ''));
        $client->setPhone($request->get('phone', ''));
        if (!is_null($request->get('data_of_birth', null))) {
            $client->setDateOfBirth(new \DateTime($request->get('data_of_birth', null)));
        }
        $client->setCpf($request->get('cpf', null));
        $client->setZipcode($request->get('zipcode', null));
        $brand = $this->brandRepository->find($request->get('brand_id', null));
        if ($brand) {
            $client->setBrand($brand);
        } else {
            return array('meta' => array('code' => 403, 'errors' => array('property_path' => 'brand_id', 'message' => 'please select a brand')));
        }

        $errors = $this->validator->validate($client);
        if (!is_null($client->getDateOfBirth()) && $client->getAge() < 18) {
            $errors[] = array('property_path' => 'data_of_birth', 'message' => 'It is not possible to register being a minor');
        }

        if (count($errors) > 0) {
            return array('meta' => array('code' => 403, 'errors' => $errors));
        }

        $this->em->persist($client);
        $this->em->flush();

        return array('meta' => array('code' => 200),'data' => $client);
    }
}