<?php

namespace App\Http\Controllers\Backend\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\ProjectRequest;
use App\Models\Portfolio\Project;
use App\Models\User;
use App\Services\Portfolio\PortfolioService;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct(private readonly PortfolioService $portfolioService)
    {
    }

    public function index()
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.view']);

        $user = User::first();
        $projects = $this->portfolioService->getProjects($user);

        return view('backend.portfolio.projects.index', compact('projects'));
    }

    public function create()
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.create']);

        return view('backend.portfolio.projects.create');
    }

    public function store(ProjectRequest $request)
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.create']);

        $user = User::first();
        $this->portfolioService->saveProject($user, $request->validated());

        return redirect()->route('admin.portfolio.projects.index')
            ->with('success', 'تم إنشاء المشروع بنجاح.');
    }

    public function show(Project $project)
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.view']);

        return view('backend.portfolio.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.edit']);

        return view('backend.portfolio.projects.edit', compact('project'));
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.edit']);

        $user = User::first();
        $data = $request->validated();
        $data['id'] = $project->id;

        $this->portfolioService->saveProject($user, $data);

        return redirect()->route('admin.portfolio.projects.index')
            ->with('success', 'تم تحديث المشروع بنجاح.');
    }

    public function destroy(Project $project)
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.delete']);

        $this->portfolioService->deleteProject($project);

        return redirect()->route('admin.portfolio.projects.index')
            ->with('success', 'تم حذف المشروع بنجاح.');
    }
}
