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
            'status'=>'otwarte',
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
    public function changeDateFormat($date)
    {
        $newStartDate = new \DateTime($date);
        return $newStartDate->format('d.m.Y');
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
     * @param $id
     * @return void
     */
    public function updateStatusToStoped($id)
    {
        $this->project->where('id',$id)->update([
            'status'=>'wstrzymane',
        ]);
    }

    /**
     * @param $id
     * @return void
     */
    public function updateStatusToEnd($id)
    {
        $project = $this->project->where('id',$id)->update([
            'status'=>'zakończone',
        ]);
        return $project;
    }

    public function updatePriceBuy($id, mixed $price_buy)
    {
        $this->project->where('id',$id)->update([
            'price_buy'=>$price_buy,
        ]);
    }

    public function updatePriceSell($id, mixed $price_sell)
    {
        $this->project->where('id',$id)->update([
            'price_sell'=>$price_sell,
        ]);
    }

    public function updateEndDate($id, string $end_date)
    {
        $this->project->where('id',$id)->update([
            'end_date'=>$end_date,
        ]);
    }

    public function updateStartDate($id, string $start_date)
    {
        $this->project->where('id',$id)->update([
            'start_date'=>$start_date,
        ]);
    }

    public function updateName($id, mixed $name)
    {
        $this->project->where('id',$id)->update([
            'name'=>$name,
        ]);
    }

    public function updateStatusToOpen($id)
    {
        {
            $this->project->where('id',$id)->update([
                'status'=>'otwarte',
            ]);
        }
    }
    public function getTopSales($date)
    {
        return $this->project
            ->selectRaw('user_id , sum(price_sell)-sum(price_buy) as kwota')
            ->take(3)
            ->orderBy('price_buy','desc')
            ->where('status','zakończone')
            ->where('updated_at','>',$date)
            ->groupBy('user_id')
            ->get();
    }

    public function getAllSales($date)
    {
        return $this->project
        ->selectRaw('sum(price_buy) as kwota')
        ->where('status','zakończone')
        ->where('updated_at','>',$date)
        ->get();

    }
}
