<?php

namespace App\Services;
use App\Repositories\CompanyRepository;
use App\Repositories\ProjectRepository;
use Faker\Provider\DateTime;

class ReportService
{

    protected $projectRepository;
    protected $companyRepository;
    public function __construct(ProjectRepository $projectRepository, CompanyRepository $companyRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->companyRepository = $companyRepository;
    }

    public function getHomeReports()
    {

        $date = strtotime('d-m-Y','-30');
        $data['top'] = $this->projectRepository->getTopSales($date);
        $data['money']= $this->projectRepository->getAllProjectPrice($date);
        $data['allNew']=$this->companyRepository->getAllCreatedCompanyInLastMonth($date);
        $data['finished'] = $this->projectRepository->getAllFinishProjectCount($date);
        $data['new'] = $this->projectRepository->getAllNewProjectCount($date);
        return $data;

    }
}
