<?php

namespace App\Http\Livewire\Posts;

use Illuminate\Http\Request;
use App\Models\Posts; // Update the class name to follow PSR-4 naming conventions
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    // Public properties
    public $search = '';
    public $perPage = '3';
    public $author = [];
    public $category = [];
    public $tag;
    public $currentPostId;

    // Constructor to initialize currentPostId from query parameter
    public function mount(Request $request)
    {
        $this->currentPostId = $request->query('post_id');
    }

    // Render method to display posts based on filters
    public function render()
    {
        // Create a base query
        $query = Posts::query();

        // Apply search filter
        if ($this->search) {
            $query->where('id', 'like', '%' . $this->search . '%')
                ->orWhere('title', 'like', '%' . $this->search . '%')
                ->orWhere('author', 'like', '%' . $this->search . '%')
                ->orWhere('category', 'like', '%' . $this->search . '%');
        }

        // Apply author filter
        if ($this->author) {
            $query->whereIn('author', $this->author);
        }

        // Apply category filter
        if ($this->category) {
            $query->whereIn('category', $this->category);
        }

        // Apply tag filter
        if ($this->tag) {
            $query->where('tag', 'like', $this->tag . '%');
        }

        // Apply combined search and author filter
        if ($this->search && $this->author) {
            $query->where('id', 'like', '%' . $this->search . '%')
                ->orWhere('title', 'like', '%' . $this->search . '%')
                ->orWhere('author', 'like', '%' . $this->search . '%')
                ->orWhere('category', 'like', '%' . $this->search . '%')
                ->whereIn('author', $this->author);
        }

        // Paginate the results
        $posts = $query->paginate($this->perPage);

        // Pass the posts to the view
        return view('livewire.posts.index', [
            'posts' => $posts,
        ]);
    }

    // Reset all filters
    public function resetfilter()
    {
        $this->reset('search');
        $this->reset('author');
        $this->reset('category');
        $this->reset('tag');
    }
}
