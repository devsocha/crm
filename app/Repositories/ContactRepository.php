<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    protected $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function add($data)
    {
        $contact = $this->contact;
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->phone = $data['phone'];
        $contact->position = $data['position'];
        $contact->company_id = $data['companyId'];
        $contact->save();
        return $contact->fresh();
    }

    public function getOne($id)
    {
        return $this->contact->where('id',$id)->first();
    }
    public function getAll()
    {
        return $this->contact->all();
    }
    public function delete($id)
    {
        $deletedUser = $this->contact->where('id',$id)->first();
        $idCompany = $deletedUser->company_id;
        $deletedUser->delete();
        return $idCompany;
    }

    public function update(array $data)
    {
        $contact = $this->contact->where('id',$data['id'])->first();
        $contact->name = $data['name'];
        $contact->email = $data['email'];
        $contact->phone = $data['phone'];
        $contact->position = $data['position'];
        $contact->save();
        return $contact->fresh();
    }
}
