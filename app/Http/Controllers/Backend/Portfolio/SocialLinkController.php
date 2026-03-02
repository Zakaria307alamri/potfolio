<?php

namespace App\Http\Controllers\Backend\Portfolio;

use App\Http\Controllers\Controller;
use App\Http\Requests\Portfolio\SocialLinkRequest;
use App\Models\Portfolio\SocialLink;
use App\Models\User;
use App\Services\Portfolio\PortfolioService;
use Illuminate\Support\Facades\Auth;

class SocialLinkController extends Controller
{
    public function __construct(private readonly PortfolioService $portfolioService)
    {
    }

    public function index()
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.view']);

        $user = User::first();
        $socialLinks = $this->portfolioService->getSocialLinks($user);
        $platforms = SocialLink::getAvailablePlatforms();

        return view('backend.portfolio.social-links.index', compact('socialLinks', 'platforms'));
    }

    public function create()
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.create']);

        $platforms = SocialLink::getAvailablePlatforms();
        return view('backend.portfolio.social-links.create', compact('platforms'));
    }

    public function store(SocialLinkRequest $request)
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.create']);

        $user = User::first();
        $this->portfolioService->saveSocialLink($user, $request->validated());

        return redirect()->route('admin.portfolio.social-links.index')
            ->with('success', 'تم إنشاء رابط التواصل بنجاح.');
    }

    public function edit(SocialLink $socialLink)
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.edit']);

        $platforms = SocialLink::getAvailablePlatforms();
        return view('backend.portfolio.social-links.edit', compact('socialLink', 'platforms'));
    }

    public function update(SocialLinkRequest $request, SocialLink $socialLink)
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.edit']);

        $user = User::first();
        $data = $request->validated();
        $data['id'] = $socialLink->id;

        $this->portfolioService->saveSocialLink($user, $data);

        return redirect()->route('admin.portfolio.social-links.index')
            ->with('success', 'تم تحديث رابط التواصل بنجاح.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $this->checkAuthorization(Auth::user(), ['portfolio.delete']);

        $this->portfolioService->deleteSocialLink($socialLink);

        return redirect()->route('admin.portfolio.social-links.index')
            ->with('success', 'تم حذف رابط التواصل بنجاح.');
    }
}
