<?php

namespace App\Controller;

use App\Company\Domain\Company;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyController;

class CompanyController extends SymfonyController
{
    #[Get(description: 'Get company details', summary: 'Get company details')]
    #[Response(content: new JsonContent(properties: [
        new Property(property: 'data', ref: new Model(type: Company::class))
    ]))]
    public function index()
    {
        $company = new Company(
            '8a8f8e8e-8e8e-8e8e-8e8e-8e8e8e8e8e8e',
            'Agency Name',
            1631610000
        );

        return $this->json([
            'data' => [
                'id'      => $company->id(),
                'name'    => $company->name(),
                'addedAt' => $company->addedAt(),
            ]
        ]);
    }

}
