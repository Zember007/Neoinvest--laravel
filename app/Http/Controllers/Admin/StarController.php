<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreStar;
use App\Models\Star;
use App\Services\Admin\StarService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class StarController extends Controller
{
    private StarService $starService;

    public function __construct(StarService $starService)
    {
        $this->starService = $starService;
    }

    public function index()
    {
        Gate::authorize('admin_view_stars');

        $stars = Star::all();

        return view('admin.stars.index', compact('stars'));
    }

    public function edit(Star $star)
    {
        Gate::authorize('admin_edit_star');

        return view('admin.stars.edit', compact('star'));
    }

    public function update(StoreStar $request, Star $star): RedirectResponse
    {
        Gate::authorize('admin_edit_star');

        $this->starService->update($star, $request->all());

        return back();
    }
}
