<?php

namespace App\Services;

use App\Repositories\ProjectRepository;
use Faker\Provider\DateTime;

class ReportService
{

    protected $projectRepository;
    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function getTopSales()
    {

        $date = strtotime('d-m-Y','-30');
        return $this->projectRepository->getTopSales($date);
    }
}
