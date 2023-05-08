<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if ($video->image)
                            <img src="{{ asset('videos' . '/' . $video->image) }}" class="img-thumbnail">
                        @endif
                        <form wire:submit.prevent="update">
                            <div class="form-group mb-2">
                                <label for="title">Title</label>
                                <input type="text" class="form-control @error('video.title') is-invalid @enderror"
                                    wire:model="video.title">
                                @error('video.title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="description">Description</label>
                                <textarea cols="40" rows="4" class="form-control @error('video.description') is-invalid @enderror"
                                    wire:model="video.description"></textarea>
                                @error('video.description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    wire:model="image" />
                                <div class="form-group">
                                    <div wire:loading wire:target="image">Uploading...</div>
                                    @if ($image)
                                        Photo Preview:
                                        <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail">
                                    @endif
                                </div>


                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="visibility">Visibility</label>
                                <select wire:model="video.visibility">
                                    <option value="private">Private</option>
                                    <option value="public">Public</option>
                                    <option value="unlisted">Unlisted</option>
                                </select>
                                @error('video.visibility')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
