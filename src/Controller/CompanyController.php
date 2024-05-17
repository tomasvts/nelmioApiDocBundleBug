<?php

namespace App\Controller;

use App\Company\Domain\Company;
use OpenApi\Attributes\Get;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as SymfonyController;

class CompanyController extends SymfonyController
{
    #[Get(description: 'Get company details', summary: 'Get company details')]
    #[ModelResponse(Company::class)]
    public function index()
    {
        $company = new Company(
            '8a8f8e8e-8e8e-8e8e-8e8e-8e8e8e8e8e8e',
            'Agency Name',
            1631610000
        );

        return $this->json([
            'id'      => $company->id(),
            'name'    => $company->name(),
            'addedAt' => $company->addedAt(),
        ]);
    }

}
