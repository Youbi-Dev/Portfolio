<?php
namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Get the first profile (assuming single user portfolio)
        $profile = Profile::first();
        
        // Get skills and projects
        $skills = Skill::all();
        $projects = Project::all();
        
        return view('welcome', compact('profile', 'skills', 'projects'));
    }
}
