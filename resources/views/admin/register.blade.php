<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="width: 100%; height: 100vh;">
        <div class="row">
            <div class="col-10 m-auto">
                <section class="py-5 shadow">
                    <div class="container-fluid h-custom">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-4">
                                <img src="https://www.allen.ac.in/ace2324/assets/images/register.png" class="img-fluid"
                                    alt="Sample image">
                            </div>
                            <div class="col-5">
                                <form method="POST" action="{{route('home.store_register')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-4">
                                            <h4 class="text-center text-success">Đăng ký Admin</h4>
                                        </div>
                                        <!-- Name input -->
                                        <div class="form-outline">
                                            <input type="text" id="name" class="form-control form-control-lg"
                                                placeholder="Nhập họ tên" name="name" />
                                            <label class="form-label" for="name">Họ tên</label>
                                        </div>
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <!-- Email input -->
                                        <div class="form-outline mt-3">
                                            <input type="email" id="email" class="form-control form-control-lg"
                                                placeholder="Nhập địa chỉ email" name="email" />
                                            <label class="form-label" for="email">Email</label>
                                        </div>
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <!-- Password input -->
                                        <div class="form-outline mt-3">
                                            <input type="password" id="password" class="form-control form-control-lg"
                                                placeholder="Nhập mật khẩu" name="password" />
                                            <label class="form-label" for="password">Mật khẩu</label>
                                        </div>
                                        @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <!-- Confirm Password input -->
                                        <div class="form-outline mt-3">
                                            <input type="password" id="confirm_password"
                                                class="form-control form-control-lg" placeholder="Nhập lại mật khẩu"
                                                name="confirm_password" />
                                            <label class="form-label" for="confirm_password">Nhập lại mật
                                                khẩu</label>
                                        </div>
                                        @error('confirm_password')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="text-center text-lg-start mt-3">
                                        <button class="btn btn-success btn-lg w-100"
                                            style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                            Đăng ký</button>
                                        <p class="small fw-bold mt-2 pt-1 mb-0">Bạn đã có tài khoản? <a
                                                href="{{route('admin.login')}}" class="link-danger">
                                                Đăng nhập</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</body>

</html>