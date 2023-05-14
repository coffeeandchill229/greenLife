<x-only-header title="Tin tức">
    <div class="row py-5">
        <div class="col-lg-9 col-12">
            @foreach ($posts as $item)
                <div class="row mb-4 d-flex align-items-center">
                    <div class="col-md-4 col-12 mb-2">
                        <img src="/storage/posts/{{ $item->image }}" class="img-thumbnail" alt="">
                    </div>
                    <div class="col-md-8 col-12">
                        <div>
                            <a href="{{ route('new_detail', $item->id) }}" class="h6 text-dark">{{ $item->title }}</a>
                            <p class="text-secondary mt-2">{{ $item->description }}</p>
                            <p style="font-size: 13px;">
                                {{ $item->created_at->format('d/m/Y') . ' bởi ' . $item->user->name }}
                                - <i class="fas fa-eye"></i> {{ $item->views ? $item->views : 0 }}</p>
                            <a href="{{ route('new_detail', $item->id) }}" class="btn btn-outline-dark mt-2">Xem chi
                                tiết</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-lg-3 d-none d-md-block">
            <h5>Bài viết mới nhất</h5>
            <ul class="m-0 p-0" style="list-style: none;">
                @foreach ($post_new as $item)
                    <li class="d-flex align-items-center border-bottom mb-3 pb-2">
                        <img src="/storage/posts/{{ $item->image }}" class="border-0 img-thumbnail" width="50"
                            alt="">
                        <div class="text-truncate">
                            <a href="{{ route('new_detail', $item->id) }}" class="text-secondary"
                                style="font-size: 13px;">{{ $item->title }}</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-only-header>
