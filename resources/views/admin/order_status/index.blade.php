<x-admin title="Order-status">
    <div class="row">
        @php
            $colors = ['#0275d8', '#5bc0de', '#5cb85c', '#f0ad4e', '#d9534f'];
        @endphp
        <div class="col-4">
            <h6 class="badge bg-info">Thêm trạng thái</h6>
            <form action="{{ route('admin.order_status.store', $order_stt_edit ? $order_stt_edit->id : '') }}"
                method="post">
                @csrf
                <x-input name="name" value="{{ $order_stt_edit ? $order_stt_edit->name : '' }}"
                    label="Tên trạng thái" />
                <div class="form-group my-2">
                    <label class="form-label">Màu sắc</label> <br>
                    @foreach ($colors as $item)
                        <input name="color" {{ $order_stt_edit && $item == $order_stt_edit->color ? 'checked' : '' }}
                            type="radio" value="{{ $item }}" />
                        <div
                            style="background: {{ $item }}; width: 30px; height: 30px; display: inline-block; border-radius: 50%;">
                        </div>
                    @endforeach
                </div>
                @if ($order_stt_edit)
                    <a href="{{ route('admin.order_status') }}" class="btn btn-dark btn-sm">Trở lại</a>
                @endif
                <button class="btn btn-sm btn-success">{{ $order_stt_edit ? 'Cập nhật' : 'Thêm' }}</button>
            </form>
        </div>
        <div class="col-lg-6 m-auto">
            <h6 class="badge bg-info">Danh Sách Trạng Thái</h6>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Màu sắc</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_status as $item)
                        <tr style="vertical-align: middle;">
                            <td scope="row">{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <div
                                    style="background: {{ $item->color }}; width: 30px; height: 30px; display: inline-block; border-radius: 50%;">
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('admin.order_status', $item->id) }}"
                                    class="btn btn-sm btn-warning"><i class="ri-quill-pen-line"></i></a>
                                <a href="" class="btn btn-sm btn-danger"><i class="ri-delete-bin-line"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin>
