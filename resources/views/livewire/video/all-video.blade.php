<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach ($videos as $video)
                    <div class="card my-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <h5>{{ $video->title }}</h5>
                                    <p class="text-truncate">{{ $video->description }}</p>
                                </div>
                                <div class="col-md-2">
                                    {{ $video->visibility }}
                                </div>
                                <div class="col-md-2">
                                    {{ $video->created_at->format('d/m/y') }}
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('video.edit', ['channel' => auth()->user()->channel, 'video' => $video->uid]) }}"
                                        class="btn btn-light btn-sm">
                                        Edit
                                    </a>
                                    <a href="" class="btn btn-light btn-sm">
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $videos->links() }}


        </div>
    </div>
</div>
