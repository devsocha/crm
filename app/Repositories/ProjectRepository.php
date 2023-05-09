<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository
{
    protected $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
         $project = $this->project->create([
            'name'=>$data['name'],
            'price_buy'=>$data['price_buy'],
            'price_sell'=>$data['price_sell'],
            'start_date'=>$data['start_date'],
            'end_date'=>$data['end_date'],
            'status'=>'open',
            'user_id'=>$data['user_id'],
            'company_id'=>$data['company_id'],
        ]);
        return $project->fresh();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->project->where('id',$id)->first();
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id)
    {
        $this->project->where('id',$id)->delete();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function update(array $data)
    {
        $project = $this->project->where('id',$data['id'])->update([
            'name'=>$data['name'],
            'price_buy'=>$data['price_buy'],
            'price_sell'=>$data['price_sell'],
            'start_date'=>$data['start_date'],
            'end_date'=>$data['end_date'],
        ]);
        return $project;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function updateStatusToInProgress($id)
    {
        $project = $this->project->where('id',$id)->update([
            'status'=>'in progress',
        ]);
        return $project->fresh();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function updateStatusToFinished($id)
    {
        $project = $this->project->where('id',$id)->update([
            'status'=>'finished',
        ]);
        return $project->fresh();
    }


}
