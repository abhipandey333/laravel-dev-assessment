<?php

namespace App\Livewire\Pages\Jobs;

use App\Models\JobOpening;
use App\Models\Skill;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $availableSkills = [];

    public $logo;

    public $jobModel = [
        'title' => '',
        'description' => '',
        'experience' => '',
        'salary' => '',
        'location' => '',
        'extra_info' => '',
        'company_name' => '',
        'skills' => [],
    ];

    public function render()
    {
        $this->availableSkills = Skill::pluck('name', 'id')->toArray();
        return view('livewire.pages.jobs.create');
    }

    public function save()
    {
        $this->validate([
            'jobModel.title' => 'required|string|max:255',
            'jobModel.description' => 'required|string',
            'jobModel.experience' => 'required|string',
            'jobModel.salary' => 'required|string',
            'jobModel.location' => 'required|string',
            'jobModel.extra_info' => 'nullable|string',
            'jobModel.company_name' => 'required|string|max:255',
            'jobModel.skills' => 'array|min:1',
            'logo' => 'required|image|max:1024',
        ], [], [
            'jobModel.title' => 'Job Title',
            'jobModel.description' => 'Job Description',
            'jobModel.experience' => 'Experience',
            'jobModel.salary' => 'Salary',
            'jobModel.location' => 'Location',
            'jobModel.extra_info' => 'Extra Information',
            'jobModel.company_name' => 'Company Name',
            'jobModel.skills' => 'Skills'
        ]);

        $this->logo->storeAs('job_logos', $this->logo->getClientOriginalName(), 'public');
        $this->jobModel['company_logo'] = $this->logo->getClientOriginalName();

        $job = JobOpening::create($this->jobModel);

        if ($job) {
            $job->skills()->sync($this->jobModel['skills']);
        }

        $this->reset('jobModel');

        $this->dispatch(
            'alert',
            ['type' => 'success', 'message' => 'Job saved successfully!', 'route' => route('admin.jobs.index')]
        );
    }

}
