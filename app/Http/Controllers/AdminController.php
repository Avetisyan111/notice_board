<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Mail\StoryApproval;
use App\Models\Story;
use App\Event\NewStoryCreated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(AdminMiddleware::class);
        $this->middleware('auth');
    }

    public function index(): View
    {
        return view('adminDashboard');
    }

    public function addStory(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2555',
        ]);

        $story = Story::create([
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->sendApprovalLink($story);

        return redirect()->route('admin.dashboard')->with('Story created successfully!');
    }

    private function sendApprovalLink(Story $story): void
    {
        $approveUrl = route('story.approve', ["id" => $story->id]);
        Mail::to('admin@gmail.com')->send(new StoryApproval($approveUrl));
    }

    public function approve($id): RedirectResponse
    {
        $story = Story::findOrFail($id);
        $story->is_approved = true;
        $story->save();

        broadcast(new NewStoryCreated($story));

        return redirect()->route('admin.dashboard')->with('Story approved successfully!');
    }

}
