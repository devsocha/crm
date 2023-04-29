<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contacts');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('addContact')->with([
            'id'=>$id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->only([
            'name',
            'email',
            'phone',
            'position',
            'companyId',
        ]);
        $result = ['status'=>200];
        try{
            $result['data'] = $this->contactService->addNewContact($data);
        }catch (\Exception $e)
        {
            $result = [
                'status'=> 500,
                'message'=>$e->getMessage(),
            ];
        }
        return redirect()->route('company.show',['id'=>$data['companyId']]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $contact = $this->contactService->getContactById($id);
        return view('showContact')->with([
            'contact'=>$contact,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contact = $this->contactService->getContactById($id);
        return view('editContact')->with([
            'contact'=>$contact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->only([
            'name',
            'email',
            'phone',
            'position',
        ]);
        $data['id'] = $id;
        try{
            $result['data'] = $this->contactService->updateContact($data);
        }catch (\Exception $e){
            $result = [
                'status'=>500,
                'message'=>$e->getMessage(),
            ];
        }
        return redirect()->route('contact.show',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $result = $this->contactService->deleteContact($id);
        }catch (\Exception $e)
        {

        }
        return redirect()->route('company.show',['id'=>$result]);
    }
}
