<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PromoController extends Controller
{
    public function index()
    {
        Gate::authorize('admin_view_promos');

        $promos = Promo::all();

        return view('admin.promos.index', compact('promos'));
    }

    public function create()
    {
        Gate::authorize('admin_create_promo');
    }

    public function store(Request $request)
    {
        Gate::authorize('admin_create_promo');
    }

    public function edit(Promo $promo)
    {
        Gate::authorize('admin_edit_promo');
    }

    public function update(Request $request, Promo $promo)
    {
        Gate::authorize('admin_edit_promo');
    }

    public function destroy(Promo $promo)
    {
        Gate::authorize('admin_delete_promo');
    }
}
