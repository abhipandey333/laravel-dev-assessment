<?php

namespace App\Livewire\Pages\Skills;

use App\Models\Skill;
use Livewire\Component;

class Index extends Component
{
    public $name;
    public $skillId;
    protected $listeners = ['delete'];

    public function render()
    {
        return view('livewire.pages.skills.index', [
            'skills' => Skill::all(),
        ]);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:' . Skill::class,
        ]);

        Skill::updateOrCreate(['id' => $this->skillId], ['name' => $this->name]);

        $this->reset(['name', 'skillId']);
    }

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        $this->skillId = $skill->id;
        $this->name = $skill->name;
    }

    public function delete($id)
    {
        $skill = Skill::findOrFail($id);
        if ($skill->jobs()->exists()) {
            $skill->jobs()->detach();
        }
        $skill->delete();
    }
}
