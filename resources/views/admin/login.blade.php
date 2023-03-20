<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login</title>

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
                <section class="py-5">
                    <div class="container-fluid h-custom">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-4">
                                <img src="https://img.freepik.com/free-vector/login-concept-illustration_114360-739.jpg?w=2000"
                                    class="img-fluid" alt="Sample image">
                            </div>
                            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                                <form method="POST" action="{{route('admin.store_login')}}">
                                    @csrf
                                    <div class="mb-4">
                                        <h4 class="text-center text-success">Đăng nhập Admin</h4>
                                    </div>
                                    <!-- Email input -->
                                    <div class="form-outline">
                                        <input type="email" id="email" class="form-control form-control-lg"
                                            placeholder="Nhập địa chỉ email" name="email" />
                                        <label class="form-label" for="email">Email</label>
                                    </div>
                                    @error('email')
                                    <span class="text-danger m-0">{{$message}}</span>
                                    @enderror
                                    <!-- Password input -->
                                    <div class="form-outline mt-3">
                                        <input type="password" id="password" class="form-control form-control-lg"
                                            placeholder="Nhập mật khẩu" name="password" />
                                        <label class="form-label" for="password">Mật khẩu</label>
                                    </div>
                                    @error('password')
                                    <span class="text-danger m-0">{{$message}}</span>
                                    @enderror
                                    <div class="text-center text-lg-start mt-3">
                                        <button class="btn btn-success btn-lg w-100"
                                            style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                            Đăng nhập</button>
                                        <p class="small fw-bold mt-2 pt-1 mb-0">Bạn chưa có tài khoản? <a
                                                href="{{route('admin.register')}}" class="link-danger">
                                                Đăng ký</a></p>
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