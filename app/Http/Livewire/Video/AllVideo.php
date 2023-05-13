<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AllVideo extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.video.all-video')
            ->with('videos', auth()->user()->channel->videos()->paginate(1))->extends('layouts.app');
    }
    public function delete(Video $video)
    {
        //delete db record
        //$deleted = Storage::disk('videos')->deleteDirectory($video->uid);

        $video->delete();

        session()->flash('message', 'Video successfully deleted.');

    }
}