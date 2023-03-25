<x-only-header title="Liên hệ">
    <div class="row my-4">
        <div class="col-9 p-3 bg-white">
            <div class="row">
                <div class="col-5">
                    <h4 class="fw-bold">Liên hệ</h4>
                    <p style="text-align: justify;">
                        Chúng tôi luôn sẵn lòng đón nhận các ý kiến đóng góp cũng như hồi đáp các thắc mắc của bạn về các
                        sản
                        phẩm, dịch vụ. Bạn có thể liên hệ qua biểu mẫu hoặc liên hệ theo các thông tin dưới đây nếu bạn
                        có
                        bất kỳ yêu cầu hoặc thắc mắc nào
                    </p>
                </div>
                <div class="col-7">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control rounded-0" placeholder="Họ tên">
                        </div>
                        <div class="form-group mt-3">
                            <input type="email" name="email" class="form-control rounded-0" placeholder="Email">
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" name="phone" class="form-control rounded-0" placeholder="Số điện thoại">
                        </div>
                        <div class="form-group mt-3">
                            <textarea type="text" rows="4" name="content" class="form-control rounded-0"
                                placeholder="Nội dung"></textarea>
                        </div>
                        <button class="btn btn-sm btn-success mt-3">Gửi</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-3 p-3 bg-white">
            <h5>Bài viết mới nhất</h5>
            <ul class="m-0 p-0" style="list-style: none;">
                <li class="d-flex align-items-center justify-content-between border-bottom mb-3 pb-2">
                    <img src="http://127.0.0.1:8000/storage/products/MX7utbHMtJ2J3ZJN98xn3wwPjnzXGKJmT75UMCbe.jpg"
                        class="border-0 img-thumbnail rounded-circle" width="50" height="50" alt="">
                    <a href="" class="text-secondary" style="font-size: 13px;">Cách trồng cây kim ngân để bàn đúng cách</a>
                </li>
                <li class="d-flex align-items-center justify-content-between border-bottom mb-3 pb-2">
                    <img src="http://127.0.0.1:8000/storage/products/MX7utbHMtJ2J3ZJN98xn3wwPjnzXGKJmT75UMCbe.jpg"
                        class="border-0 img-thumbnail rounded-circle" width="50" height="50" alt="">
                    <a href="" class="text-secondary" style="font-size: 13px;">Cách trồng cây kim ngân để bàn đúng cách</a>
                </li>
                <li class="d-flex align-items-center justify-content-between border-bottom mb-3 pb-2">
                    <img src="http://127.0.0.1:8000/storage/products/MX7utbHMtJ2J3ZJN98xn3wwPjnzXGKJmT75UMCbe.jpg"
                        class="border-0 img-thumbnail rounded-circle" width="50" height="50" alt="">
                    <a href="" class="text-secondary" style="font-size: 13px;">Cách trồng cây kim ngân để bàn đúng cách</a>
                </li>
                <li class="d-flex align-items-center justify-content-between border-bottom mb-3 pb-2">
                    <img src="http://127.0.0.1:8000/storage/products/MX7utbHMtJ2J3ZJN98xn3wwPjnzXGKJmT75UMCbe.jpg"
                        class="border-0 img-thumbnail rounded-circle" width="50" height="50" alt="">
                    <a href="" class="text-secondary" style="font-size: 13px;">Cách trồng cây kim ngân để bàn đúng cách</a>
                </li>
            </ul>
        </div>
    </div>
</x-only-header>