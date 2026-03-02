<?php

namespace App\Http\Controllers\Backend\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\ExperienceRequest;
use App\Models\Portfolio\Experience;
use App\Models\User;
use App\Services\Portfolio\PortfolioService;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    public function __construct(private readonly PortfolioService $portfolioService)
    {
    }

    public function index()
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.view']);

        $user = User::first();
        $experiences = $this->portfolioService->getExperiences($user);

        return view('backend.portfolio.experiences.index', compact('experiences'));
    }

    public function create()
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.create']);

        return view('backend.portfolio.experiences.create');
    }

    public function store(ExperienceRequest $request)
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.create']);

        $user = User::first();
        $this->portfolioService->saveExperience($user, $request->validated());

        return redirect()->route('admin.portfolio.experiences.index')
            ->with('success', 'تم إنشاء الخبرة بنجاح.');
    }

    public function edit(Experience $experience)
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.edit']);

        return view('backend.portfolio.experiences.edit', compact('experience'));
    }

    public function update(ExperienceRequest $request, Experience $experience)
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.edit']);

        $user = User::first();
        $data = $request->validated();
        $data['id'] = $experience->id;

        $this->portfolioService->saveExperience($user, $data);

        return redirect()->route('admin.portfolio.experiences.index')
            ->with('success', 'تم تحديث الخبرة بنجاح.');
    }

    public function destroy(Experience $experience)
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.delete']);
        $this->portfolioService->deleteExperience($experience);

        return redirect()->route('admin.portfolio.experiences.index')
            ->with('success', 'تم حذف الخبرة بنجاح.');
    }
}
