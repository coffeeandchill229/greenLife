<x-only-header title="Liên hệ">
    <div class="row my-4">
        <div class="col-lg-9 col-12 p-3 bg-white">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <h4 class="fw-bold">Liên hệ</h4>
                    <p style="text-align: justify;">
                        Chúng tôi luôn sẵn lòng đón nhận các ý kiến đóng góp cũng như hồi đáp các thắc mắc của bạn về
                        các
                        sản
                        phẩm, dịch vụ. Bạn có thể liên hệ qua biểu mẫu hoặc liên hệ theo các thông tin dưới đây nếu bạn
                        có
                        bất kỳ yêu cầu hoặc thắc mắc nào
                    </p>
                </div>
                <div class="col-lg-7 col-md-6">
                    <form action="{{ route('home.store_contact') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control rounded-0" placeholder="Họ tên">
                        </div>
                        <div class="form-group mt-3">
                            <input type="email" name="email" class="form-control rounded-0" placeholder="Email">
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" name="phone" class="form-control rounded-0"
                                placeholder="Số điện thoại">
                        </div>
                        <div class="form-group mt-3">
                            <textarea type="text" rows="4" name="content" class="form-control rounded-0" placeholder="Nội dung"></textarea>
                        </div>
                        <button class="btn btn-sm btn-success mt-3">Gửi</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-12 p-3 bg-white">
            <h5>Bài viết mới nhất</h5>
            <ul class="m-0 p-0" style="list-style: none;">
                @if (isset($post_new))
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
                @endif
            </ul>
        </div>
    </div>
</x-only-header>
