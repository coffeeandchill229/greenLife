$('.btn_add_to_cart').on("click", (e) => {
    const id = Number(e.target.dataset.id);
    addToCart(id);
});

function addToCart(id) {
    $.ajax({
        url: '/cart/add/' + id,
        type: 'GET',
        success: (res) => {
            if (res.total_quantity) {
                $('#cart_number').html(`[${res.total_quantity}]`);
                swal({
                    text: "Thêm vào giỏ hàng thành công!",
                    icon: "success"
                });
            }
        },
        error: (err) => {
            swal({
                text: "Thêm vào giỏ hàng không thành công!",
                icon: "warning"
            });
        }
    });
}