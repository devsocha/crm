<?php

namespace App\Repositories;

use App\Models\File;

class FileRepository
{
    protected $file;

    public function __construct(File $file)
    {
        $this->file = $file;
    }

    public function addInCompany($data)
    {
        return $this->file->create([
            'name'=>$data['name'],
            'path'=>$data['path'],
            'company_id'=>$data['company_id'],
        ]);
    }
    public function addInProject($data)
    {
        return $this->file->create([
            'name'=>$data['name'],
            'path'=>$data['path'],
            'company_id'=>$data['company_id'],
            'project_id'=>$data['project_id'],
        ]);
    }
    public function get($id)
    {
        return $this->file->where('id',$id)->first();
    }
}
