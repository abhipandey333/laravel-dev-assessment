<?php

namespace App\Livewire\Pages\Jobs;

use App\Models\JobOpening;
use Livewire\Component;

class Index extends Component
{
    public array $jobs = [];

    protected $listeners = ['deleteJobs'];

    public function render()
    {
        $this->jobs = JobOpening::with('skills')->get()->toArray();
        return view('livewire.pages.jobs.index');
    }

    public function deleteJobs($id)
    {
        $job = JobOpening::findOrFail($id);
        $logoPath = public_path('/storage/job_logos/' . $job->company_logo);
        if (file_exists($logoPath)) {
            unlink($logoPath);
        }
        $job->skills()->detach();
        $job->delete();
    }

}
