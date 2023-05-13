<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('addProject')->with(['id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id, Request $request)
    {
        $data = $request->only([
            'name',
            'price_buy',
            'price_sell',
            'start_date',
            'end_date',
        ]);
        $data['user_id'] = Auth::id();
        $data['company_id'] = $id;
        try{
            $project = $this->projectService->addNewProject($data);
        }catch (\Exception $e)
        {
            echo $e->getMessage();
        }
        return redirect()->route('project.show',['id'=>$project->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = $this->projectService->getProject($id);
        return view('showProject')->with(['project'=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = $this->projectService->getProject($id);
        return view('editProject')->with(['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $data = $request->only([
            'name',
            'price_buy',
            'price_sell',
            'start_date',
            'end_date',
        ]);
        try{
            $this->projectService->updateProject($id, $data);
            $project = $this->projectService->getProject($id);
        }catch (\Exception $e)
        {
            echo $e->getMessage();
        }
                return redirect()->route('project.show',['id'=>$project->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
           $this->projectService->deleteProject($id);
        }catch (\Exception $e)
        {

        }
        return redirect()->route('companies');
    }
    public function updateStatusToEnd($id)
    {
        try {
            $this->projectService->changeToEnd($id);
            $project = $this->projectService->getProject($id);
        }catch (\Exception $e)
        {

        }
        return view('showProject')->with(['project'=>$project]);
    }
    public function updateStatusToStopped($id)
    {
        try {
            $this->projectService->changeToStopped($id);
            $project = $this->projectService->getProject($id);
        }catch (\Exception $e)
        {

        }
        return view('showProject')->with(['project'=>$project]);
    }

    public function updateStatusToOpen($id)
    {
        try {
            $this->projectService->changeToOpen($id);
            $project = $this->projectService->getProject($id);
        }catch (\Exception $e)
        {

        }
        return view('showProject')->with(['project'=>$project]);
    }
}
