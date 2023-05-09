<?php

namespace App\Services;

use App\Repositories\ProjectRepository;
use Illuminate\Support\Facades\Validator;

class ProjectService
{
protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function addNewProject(array $data)
    {
        Validator::make($data,[
            'name'=>'required',
            'price_buy'=>'required',
            'price_sell'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'user_id'=>'required',
            'company_id'=>'required',
        ]);

        return $this->projectRepository->add($data);
    }

    public function getProject($id)
    {
        $project = $this->projectRepository->get($id);
        if($project->start_date){
            $newStartDate = new \DateTime($project->start_date);
            $project->start_date = $newStartDate->format('d.m.Y');

        }
        if($project->end_date){
            $newEndDate = new \DateTime($project->end_date);
            $project->end_date = $newEndDate->format('d.m.Y');
        }
        return $project;
    }
    public function deleteProject($id)
    {
        $this->projectRepository->delete($id);
    }

}
