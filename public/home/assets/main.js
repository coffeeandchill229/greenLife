const header = document.querySelector('header');
const btn_back_to_top = document.querySelector('.back_to_top');
const search_form = document.querySelector('.search_form');
const avatar = document.querySelector('#avatar');
const avatar_review = document.querySelector('#avatar_review');

const btn_reply = document.querySelectorAll('.btn_reply');
const box_reply = document.querySelectorAll('.box_reply');
const btn_cancel = document.querySelectorAll('.btn_cancel');

function start() {
    scrollHeader();
    backToTop();
    changeAvatar();
    showReplyComment();
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

function backToTop() {
    btn_back_to_top.onclick = () => {
        document.documentElement.scrollTop = 0;
    }
}

function changeAvatar() {
    avatar.onchange = (e) => {
        console.log(avatar_review);
        avatar_review.src = URL.createObjectURL(e.target.files[0]);
    }
}

function showReplyComment() {
    btn_reply.forEach((element, index) => {
        element.onclick = () => {
            box_reply[index].style.display = 'flex';
        }
    });
    btn_cancel.forEach((element, index) => {
        element.onclick = () => {
            box_reply[index].style.display = 'none';
        }
    });
}

start();
