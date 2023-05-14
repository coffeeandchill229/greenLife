<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xuất hóa đơn</title>
    <style>
        body {
            font-family: DejaVu Sans;
        }

        .styled-table {
            border-collapse: collapse;
            /* margin: 25px 0; */
            font-size: 0.9em;
            width: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 5px 10px;
        }

        styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
    </style>

</head>

<body>
    <h3 style="text-transform: uppercase; text-align: center;">Hóa đơn thanh toán</h3>
    <p style="text-align: center;">------oOo------</p>
    <table class="styled-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @if ($order_detail)
                @foreach ($order_detail as $item)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td style="text-align: right;">{{ number_format($item->price) }}</td>
                        <td style="text-align: center;">{{ $item->quantity }}</td>
                        <td style="text-align: right;">{{ number_format($item->quantity * $item->price) }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" style="text-align: right; font-weight: bold;">Tổng cộng:</td>
                    <td style="text-align: right;">{{ number_format($item->order->total) }}</td>
                </tr>
            @endif
        </tbody>
    </table>
    <table style="width: 100%; margin-top: 15px;">
        <tr>
            <td>Khách hàng</td>
            <td style="text-align: right;">
                <span>Ngày....tháng....năm....</span> <br>
                <span style="margin-right: 50px;">Nhân viên</span>
            </td>
        </tr>
    </table>
</body>

</html>
