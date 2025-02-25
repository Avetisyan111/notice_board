<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDashboard(): View
    {
        $stories = Story::where("is_approved", true)->get()->toArray();

        return view('dashboard', compact('stories'));
    }

}
