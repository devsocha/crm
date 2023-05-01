<?php

namespace App\Services;

use App\Repositories\ContactRepository;
use Illuminate\Support\Facades\Validator;

class ContactService
{
    protected $contactRepository;
    public function __construct(ContactRepository $contactRepository)
    {
     $this->contactRepository = $contactRepository;
    }

    public function getAllWithPagination()
    {
        return $this->contactRepository->getAll();
    }

    public function addNewContact($data)
    {
        Validator::make($data,[
            'name'=>'required',
            'email'=>'required | email',
            'phone'=>'required',
            'position'=>'required',
            'companyId'=>'required',
        ]);

        $data['phone'] = str_replace([' ','-'],'',$data['phone']);
        return $this->contactRepository->add($data);
    }

    public function getContactById($id)
    {
        return $this->contactRepository->getOne($id);
    }

    public function updateContact(array $data)
    {
        Validator::make($data,[
            'id'=>'required',
            'name'=>'required',
            'email'=>'required | email',
            'phone'=>'required',
            'position'=>'required'
        ]);
        $data['phone'] = str_replace([' ','-'],'',$data['phone']);
        return $this->contactRepository->update($data);
    }

    public function deleteContact(int $id)
    {
        return $this->contactRepository->delete($id);
    }

}
