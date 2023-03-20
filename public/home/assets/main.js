const pds = [
    {
        tensanpham: 'Cây Bạch Mã Hoàng Tử',
        hinhanh: 'https://cayxinh.vn/wp-content/uploads/2017/12/cay-bach-ma-hoang-tu-400x400.jpg',
        gia: '500.000 VND',
    },
    {
        tensanpham: 'Vạn Lộc',
        hinhanh: 'https://9xgarden.com/wp-content/uploads/2022/12/cay-trong-khong-dat-de-ban-chau-kichirou-9xgarden-16-300x300.jpg',
        gia: '219.000 VND',
    },
    {
        tensanpham: 'Trường Sin',
        hinhanh: 'https://9xgarden.com/wp-content/uploads/2022/12/cay-trong-khong-dat-de-ban-chau-kichirou-9xgarden-14-300x300.jpg',
        gia: '219.000 VND',
    },
    {
        tensanpham: 'Trầu Bà Sữa',
        hinhanh: 'https://9xgarden.com/wp-content/uploads/2022/12/cay-trong-khong-dat-de-ban-chau-kichirou-9xgarden-29-300x300.jpg',
        gia: '219.000 VND',
    },
    {
        tensanpham: 'Trầu Bà Neo',
        hinhanh: 'https://9xgarden.com/wp-content/uploads/2022/12/cay-trong-khong-dat-de-ban-chau-kichirou-9xgarden-23-300x300.jpg',
        gia: '219.000 VND',
    },
    {
        tensanpham: 'Phát Tài Út',
        hinhanh: 'https://9xgarden.com/wp-content/uploads/2022/12/cay-trong-khong-dat-de-ban-chau-kichirou-9xgarden-26-300x300.jpg',
        gia: '219.000 VND',
    },
    {
        tensanpham: 'Bàng Sin',
        hinhanh: 'https://9xgarden.com/wp-content/uploads/2022/12/cay-trong-khong-dat-de-ban-chau-kichirou-9xgarden-41-300x300.jpg',
        gia: '219.000 VND',
    },
    {
        tensanpham: 'Terrarium - Happy Garden',
        hinhanh: 'https://9xgarden.com/wp-content/uploads/2022/10/terrarium-tieu-canh-de-ban-joy-in-happy-garden-9x-garden-4-300x300.jpg',
        gia: '219.000 VND',
    },
    {
        tensanpham: 'Cây Bạch Mã Hoàng Tử',
        hinhanh: 'https://cayxinh.vn/wp-content/uploads/2017/12/cay-bach-ma-hoang-tu-400x400.jpg',
        gia: '500.000 VND',
    },
    {
        tensanpham: 'Vạn Lộc',
        hinhanh: 'https://9xgarden.com/wp-content/uploads/2022/12/cay-trong-khong-dat-de-ban-chau-kichirou-9xgarden-16-300x300.jpg',
        gia: '219.000 VND',
    },
    {
        tensanpham: 'Trường Sin',
        hinhanh: 'https://9xgarden.com/wp-content/uploads/2022/12/cay-trong-khong-dat-de-ban-chau-kichirou-9xgarden-14-300x300.jpg',
        gia: '219.000 VND',
    },
    {
        tensanpham: 'Trầu Bà Sữa',
        hinhanh: 'https://9xgarden.com/wp-content/uploads/2022/12/cay-trong-khong-dat-de-ban-chau-kichirou-9xgarden-29-300x300.jpg',
        gia: '219.000 VND',
    },
    {
        tensanpham: 'Trầu Bà Neo',
        hinhanh: 'https://9xgarden.com/wp-content/uploads/2022/12/cay-trong-khong-dat-de-ban-chau-kichirou-9xgarden-23-300x300.jpg',
        gia: '219.000 VND',
    },
    {
        tensanpham: 'Phát Tài Út',
        hinhanh: 'https://9xgarden.com/wp-content/uploads/2022/12/cay-trong-khong-dat-de-ban-chau-kichirou-9xgarden-26-300x300.jpg',
        gia: '219.000 VND',
    },
    {
        tensanpham: 'Bàng Sin',
        hinhanh: 'https://9xgarden.com/wp-content/uploads/2022/12/cay-trong-khong-dat-de-ban-chau-kichirou-9xgarden-41-300x300.jpg',
        gia: '219.000 VND',
    },
    {
        tensanpham: 'Terrarium - Happy Garden',
        hinhanh: 'https://9xgarden.com/wp-content/uploads/2022/10/terrarium-tieu-canh-de-ban-joy-in-happy-garden-9x-garden-4-300x300.jpg',
        gia: '219.000 VND',
    },
];
const header = document.querySelector('header');
const btn_back_to_top = document.querySelector('.back_to_top');
const product_list = document.querySelector('.product_list');
const search_form = document.querySelector('.search_form');

function start() {
    scrollHeader();
    backToTop();
    renderProducts();
}

function scrollHeader() {
    window.addEventListener('scroll', (e) => {
        // Header
        if (window.scrollY > 10) {
           Object.assign(header.style, {
                top: '0px',
           });
        } else {
            Object.assign(header.style, {
                top: '32px',
           });
        }
        // Show btn back to top
        if (window.scrollY > 200) {
            btn_back_to_top.style.bottom = '5px';
        } else {
            btn_back_to_top.style.bottom = '-40px';
        }

    })
}

function renderProducts() {
    for (let i = 0; i < pds.length; i++) {
        let html = document.createElement('div');
        html.className = 'product_item col-lg-3 col-md-4 col-6';
        html.innerHTML = `
        <div class="card mb-2 shadow">
          <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
            <img src="${pds[i].hinhanh}"
              class="img-fluid" alt="${pds[i].tensanpham}"/>
            <a href="#!">
              <div class="mask" style="background-color: rgba(0, 0, 0, 0.05)"></div>
            </a>
          </div>
          <div class="card-body text-center">
            <h5 class="card-title">${pds[i].tensanpham}</h5>
            <p class="card-text text-danger fw-bold">${pds[i].gia}</p>
          </div>
        </div>
        `;
        product_list.appendChild(html);
    }
}

function backToTop() {
    btn_back_to_top.onclick = () => {
        document.documentElement.scrollTop = 0;
    }
}

start();