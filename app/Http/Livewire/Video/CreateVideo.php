<?php

namespace App\Http\Livewire\Video;

use App\Models\Channel;
use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVideo extends Component
{
    use WithFileUploads;

    public Channel $channel;
    public Video $video;

    public $videoFile;

    protected $rules = [
        'videoFile' => 'required|mimes:m4v,avi,flv,mp4,mov,webm|max:1228800',

    ];
    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }
    public function render()
    {
        return view('livewire.video.create-video')->extends('layouts.app');
    }
    public function fileCompleted()
    {
        //validation
        $this->validate();
        //create video record in db
        $this->video = $this->channel->videos()->create([
            'title' => 'Untitled',
            'description' => 'none',
            'uid' => uniqid(true),
            'visibility' => 'private',
        ]);
        //redirect to edit route
        return redirect()->route('video.edit', [
            'channel' => $this->channel,
            'video' => $this->video
        ]);
    }

}
