<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Audio\StoreAudioRequest;
use App\Http\Requests\Audio\UpdateAudioRequest;
use App\Models\Audio;
use Illuminate\Http\Request;

class AudioController extends BaseController
{
    public function index()
    {
        $audios = Audio::latest()->get();
        return view('admin.audio.index', compact('audios'));
    }
    public function store(StoreAudioRequest $request)
    {
        Audio::create($request->validated());
        toast('Audio added successfully', 'success');
        return back();
    }
    public function edit(Audio $audio)
    {
        return view('admin.audio.edit', compact('audio'));
    }

    public function update(UpdateAudioRequest $request, Audio $audio)
    {
        if ($request->hasFile('file') && $audio->file) {
            $this->deleteFile($audio->file);
        }
        $audio->update($request->validated());
        toast('Audio updated successfully', 'success');
        return redirect(route('admin.audio.index'));
    }

    public function destroy(Audio $audio)
    {
        if ($audio->file) {
            $this->deleteFile($audio->file);
        }
        $audio->delete();
        toast('Audio deleted successfully', 'success');
        return back();
    }
}
