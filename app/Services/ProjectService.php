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
        if(isset($project->start_date))
        {
            $project->start_date = $this->projectRepository->changeDateFormat($project->start_date);
        }
        if(isset($project->end_date))
        {
            $project->end_date = $this->projectRepository->changeDateFormat($project->end_date);
        }
        return $project;
    }
    public function deleteProject($id)
    {
        $this->projectRepository->delete($id);
    }
    public function updateProject($id, $data)
    {
        Validator::make($data,[
            'name'=>'required',
        ]);
        $this->projectRepository->updateName($id,$data['name']);
        if(!is_null($data['start_date']))
        {
            $this->projectRepository->updateStartDate($id,$data['start_date']);
        }

        if(!is_null($data['end_date']))
        {
            $this->projectRepository->updateEndDate($id,$data['end_date']);
        }
        if(!is_null($data['price_buy']))
        {
            $this->projectRepository->updatePriceBuy($id,$data['price_buy']);
        }
        if(!is_null($data['price_sell']))
        {
            $this->projectRepository->updatePriceSell($id,$data['price_sell']);
        }
    }

    public function changeToStopped($id)
    {
        $this->projectRepository->updateStatusToStoped($id);
    }

    public function changeToEnd($id)
    {
        $this->projectRepository->updateStatusToEnd($id);
    }

    public function changeToOpen($id)
    {
        $this->projectRepository->updateStatusToOpen($id);
    }

}
