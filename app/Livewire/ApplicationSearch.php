<?php

namespace App\Livewire;
use App\Models\Application;
use Livewire\Component;

class ApplicationSearch extends Component
{
    public string $search = '';
    public function render()
    {
        $applications = ($this->search === '')
            ? collect([])
            : Application::query()
                ->whereNotNull('published_at')
                ->where(function ($query) {
                    $query->where('name', 'like', "%{$this->search}%")
                        ->orWhere('description', 'like', "%{$this->search}%");
                })
                ->take(10)
                ->get();

        return view('livewire.application-search', compact('applications'));
    }
}
