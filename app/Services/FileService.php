<?php

namespace App\Services;

use App\Repositories\FileRepository;
use Illuminate\Support\Facades\Validator;

class FileService
{
    protected $fileRepository;

    public function __construct(FileRepository $fileRepository)
    {
        $this->fileRepository = $fileRepository;
    }

    public function addFileAboutCompany($data)
    {
        Validator::make($data,[
            'file'=>'required | mimes:pdf,jpeg,png,jpg',
            'company_id'=>'required',
            'view_name'=>'required',
        ]);
        $ext = $data['file']->extension();
        $nameWithoutExt = hash('sha256',time().$data['company_id']);
        $data['name'] = $nameWithoutExt.'.'.$ext;
        $data['path'] = public_path('uploads/');
        $data['file']->move($data['path'],$data['name']);
        if(isset($data['project_id']))
        {
            Validator::make($data,[
                'project_id'=>'required',
            ]);
            $file = $this->fileRepository->addInProject($data);
        }else
        {
            $file = $this->fileRepository->addInCompany($data);
        }
        return $file;
    }

    public function deleteFileAboutCompany($id)
    {
        $file = $this->fileRepository->get($id);
        $this->fileRepository->delete($id);
        unlink($file->path.'/'.$file->name);
        return $file->company_id;
    }

    public function getFileToDownload($id)
    {
        $file = $this->fileRepository->get($id);
        $data = [
            'file'=>$file->path.'/'.$file->name,
            'name'=>$file->view_name,
        ];
        return $data;
    }
}
