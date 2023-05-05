<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent="update">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('channel.name') is-invalid @enderror"
                wire:model="channel.name">
            @error('channel.name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control @error('channel.slug') is-invalid @enderror"
                wire:model="channel.slug">
            @error('channel.slug')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea cols="40" rows="4" class="form-control @error('channel.description') is-invalid @enderror"
                wire:model="channel.description"></textarea>
            @error('channel.description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" wire:model="image" />
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


        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
