const product_active_btn = document.querySelectorAll('.product_active_btn');
product_active_btn.forEach(element => {
    element.addEventListener('click', (e) => {
        let product_id = e.target.value;
        $.ajax({
            url: '/admin/products/active/' + product_id,
            success: (data) => {
                if (data) {
                    Toastify({
                        text: data.message,
                        className: "info",
                        style: {
                            background: "#03C988",
                        }
                    }).showToast();
                }
            },
            error: (err) => {
                Toastify({
                    text: err.status + ' ' + err.statusText,
                    className: "warning",
                    style: {
                        background: "#FF1E00",
                    }
                }).showToast();
            }
        });
    });
});

// Render Page using Ajax
function renderPage(url = '') {
    $.ajax({
        url: '/admin' + url,
        success: (data) => {
            if (data) {
                $('#wrapper-content').html(data);
            }
        },
        error: (err) => {
            console.log(err);
        }
    });
}
