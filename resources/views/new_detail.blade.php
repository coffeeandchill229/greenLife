<x-only-header title="{{$new_detail->title}}">
    <div class="row py-5">
        <div class="col-9">
            <h4 class="fw-bold">{{$new_detail->title}}</h4>
            <p class="mt-3">Đăng vào <span class="text-success">{{$new_detail->created_at->format('d/m/Y')}}</span> bởi
                <span class="text-success">{{$new_detail->user->name}}</span>
            </p>
            <div class="mt-3" style="text-align: justify;">
                {!!$new_detail->content!!}
            </div>
            {{-- Comment --}}
            <h6 class="mb-3">Bình luận ({{count($comments)}})</h6>
            @if (Auth::guard('customer')->user())
            @foreach ($comments as $item)
            <div class="d-flex">
                <img src="/storage/avatars/{{$item->customer->avatar}}" width="40" height="40" class="rounded-circle"
                    alt="">
                <div class="ms-2" style="width: 100%;">
                    <h6>{{$item->customer->name}}</h6>
                    <p class="p-2 rounded-2" style="text-align: justify; background: #f1f1f1;">{{$item->content}}</p>
                    {{-- Delete - comment --}}
                    <div class="text-end">
                        <a style="font-size: 13px;" class="btn_reply">Trả lời</a>
                        @if ($item->customer == Auth::guard('customer')->user())
                        <a style="font-size: 13px;" class="ms-2 text-danger"
                            href="{{route('home.comment.delete',$item->id)}}">Xóa</a>
                        @endif
                    </div>

                    {{-- Show reply comment --}}
                    @if($item->replies)
                    @foreach ($item->replies as $child)
                    <div class="row">
                        <div class="d-flex">
                            <img src="/storage/avatars/{{$child->customer->avatar}}" width="40" height="40"
                                class="rounded-circle" alt="">
                            <div class="ms-2" style="width: 100%;">
                                <h6>{{$child->customer->name}}</h6>
                                <p class="p-2 rounded-2" style="text-align: justify; background: #f1f1f1;">
                                    {{$child->content}}</p>
                                <div class="text-end">
                                    @if ($child->customer == Auth::guard('customer')->user())
                                    <a style="font-size: 13px;" class="ms-2 text-danger"
                                        href="{{route('home.reply_comment.delete',$child->id)}}">Xóa</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    {{-- End reply comment --}}

                    {{-- Reply Box --}}
                    <div class="mt-3 box_reply" style="display: none;">
                        <img src="/storage/avatars/{{Auth::guard('customer')->user()->avatar}}" width="40" height="40"
                            class="rounded-circle" alt="">
                        <div class="ms-2" style="width: 100%;">
                            <form
                                action="{{route('home.store_reply_comment',[$item->id,Auth::guard('customer')->user()->id])}}"
                                method="POST">
                                @csrf
                                <textarea name="content" class="form-control" rows="2"></textarea>
                                <div class="text-end mt-3">
                                    <button class="btn btn-sm btn-danger btn_cancel" type="button">Hủy</button>
                                    <button class="btn btn-sm btn-primary">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- End reply box--}}
                </div>
            </div>
            @endforeach
            <div class="d-flex mt-3">
                <img src="/storage/avatars/{{Auth::guard('customer')->user()->avatar}}" width="40" height="40"
                    class="rounded-circle" alt="">
                <div class="ms-2" style="width: 100%;">
                    <form action="{{route('home.store_comment',[$new_detail->id,Auth::guard('customer')->user()->id])}}"
                        method="POST">
                        @csrf
                        <textarea name="content" placeholder="Hãy nhập gì đó..." class="form-control"
                            rows="4"></textarea>
                        <div class="text-end mt-3">
                            <button class="btn btn-sm btn-primary">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
            @else
            <p>Vui lòng <a href="{{route('home.login')}}" class="text-success">Đăng nhập</a> để bình luận!</p>
            @endif
            {{-- End Comment --}}

        </div>
        <div class="col-3">
            <h5>Bài viết mới nhất</h5>
            <ul class="m-0 p-0" style="list-style: none;">
                @foreach ($post_new as $item)
                <li class="d-flex align-items-center border-bottom mb-3 pb-2">
                    <img src="/storage/posts/{{$item->image}}" class="border-0 img-thumbnail" width="50" alt="">
                    <div class="text-truncate">
                        <a href="{{route('new_detail',$item->id)}}" class="text-secondary"
                            style="font-size: 13px;">{{$item->title}}</a>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-only-header>