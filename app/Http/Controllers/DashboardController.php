<?php

namespace App\Http\Controllers;

use App\Models\JobOpening;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $jobs = JobOpening::with('skills')->get()->map(function ($job) {
            return [
                'id' => $job->id,
                'title' => $job->title,
                'description' => $job->description,
                'skills' => $job->skills->map(function ($skill) {
                    return [
                        'id' => $skill->id,
                        'name' => $skill->name,
                    ];
                }),
                'type' => $job->extra_info,
                'company_name' => $job->company_name,
                'location' => $job->location,
                'salary' => $job->salary,
                'experience' => $job->experience,
                'created_at' => $job->created_at->diffForHumans(),
                'logo' => asset('storage/job_logos/' . $job->company_logo)
            ];
        });
        return Inertia::render('Dashboard', [
            'jobs' => $jobs,
        ]);
    }
}
