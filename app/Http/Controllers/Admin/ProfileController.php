<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the authenticated user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // Get the profile if it exists, otherwise create a new instance
        $profile = Profile::first() ?? new Profile();
        
        // Convert social_media_links to array if it's stored as JSON
        if (isset($profile->social_media_links) && is_string($profile->social_media_links)) {
            $profile->social_media_links = json_decode($profile->social_media_links, true);
        }
        
        // Ensure social_media_links is at least an empty array to prevent errors
        if (empty($profile->social_media_links)) {
            $profile->social_media_links = [];
        }
        
        return view('admin.profile', compact('profile'));
    }

    /**
     * Update the authenticated user's profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'profile_image' => 'nullable|image|max:2048',
            'resume_file' => 'nullable|mimes:pdf,doc,docx|max:10240', // max 10MB
            'availability_status' => 'nullable|boolean',
            'social_media_links' => 'nullable|array',
            'social_media_links.*.platform' => 'nullable|string|max:255',
            'social_media_links.*.url' => 'nullable|url|max:255',
            'social_media_links.*.icon_class' => 'nullable|string|max:255',
        ]);

        // Find the existing profile or create a new one
        $profile = Profile::first() ?? new Profile();

        // Assign the validated data to the profile object
        $profile->first_name = $validatedData['first_name'];
        $profile->last_name = $validatedData['last_name'];
        $profile->title = $validatedData['title'];
        $profile->bio = $validatedData['bio'] ?? null;

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            // Delete old image if it exists
            if ($profile->profile_image && Storage::disk('public')->exists($profile->profile_image)) {
                Storage::disk('public')->delete($profile->profile_image);
            }
            $profile->profile_image = $request->file('profile_image')->store('profile_images', 'public');
        }

        // Handle resume file upload
        if ($request->hasFile('resume_file')) {
            // Delete old file if it exists
            if ($profile->resume_file && Storage::disk('public')->exists($profile->resume_file)) {
                Storage::disk('public')->delete($profile->resume_file);
            }
            $profile->resume_file = $request->file('resume_file')->store('resumes', 'public');
        }

        // Filter out empty social media links
        if (!empty($validatedData['social_media_links'])) {
            $profile->social_media_links = array_filter($validatedData['social_media_links'], function($link) {
                return !empty($link['platform']) && !empty($link['url']);
            });
        } else {
            $profile->social_media_links = [];
        }

        $profile->availability_status = $validatedData['availability_status'] ?? false;
        
        // Set the user_id to the authenticated user's ID
        $profile->user_id = auth()->id();

        // Save the profile
        $profile->save();

        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully!');
    }
}