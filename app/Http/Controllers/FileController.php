<?php

namespace App\Http\Controllers;

use App\Services\FileService;
use Illuminate\Http\Request;

class FileController extends Controller
{
    protected $fileService;

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function addDocInCompany(Request $request)
    {
        $data = $request->only([
            'file',
            'company_id',
            'contact_id',
        ]);
        try{
            $result = $this->fileService->addFileAboutCompany($data);
        }catch (\Exception $e)
        {

        }

        return redirect()->route('company.show',['id'=>$data['company_id']]);
    }

    public function deleteDocFromCompany($id)
    {
        try {
            $result = $this->fileService->deleteFileAboutCompany($id);
        }catch (\Exception $e)
        {

        }
        return redirect()->route('company.show',['id'=>$result]);

    }
}
