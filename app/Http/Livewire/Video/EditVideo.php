<?php

namespace App\Http\Livewire\Video;

use App\Models\Channel;
use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;
use Image;


class EditVideo extends Component
{
    use WithFileUploads;

    public Channel $channel;
    public Video $video;
    public $image;

    protected $rules = [
        'video.title' => 'required|max:255',
        'video.description' => 'nullable|max:1000',
        'video.visibility' => 'required|in:private,public,unlisted',
        'image' => 'nullable|image|mimes:png,jpeg,png,jpg,gif,svg|max:2048',
    ];
    public function mount($channel, $video)
    {
        $this->channel = $channel;
        $this->video = $video;
    }
    public function render()
    {
        return view('livewire.video.edit-video')->extends('layouts.app');
    }
    public function update()
    {
        #validation
        $this->validate();
        if ($this->image) {
            $image = $this->image->storeAs('videos', $this->channel->uid . '.png');
            $imageName = explode('/', $image)[1];

            //resize and convert to png
            $img = Image::make(storage_path() . '/app/' . $image)->encode('png')->fit(250, 250, function ($constraint) {
                $constraint->upsize();
            })->save();

            //update file path in db
            $this->channel->update([
                'image' => $imageName,
            ]);
        }
        $this->video->update([
            'title' => $this->video->title,
            'description' => $this->video->description,
            'visibility' => $this->video->visibility,
        ]);
        session()->flash('message', 'Video successfully updated.');
        //return redirect()->route('channel.edit', ['channel' => $this->channel->slug]);
    }
}