let currentSlide = 0;
const slides = document.querySelectorAll('.slide');

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.remove('active');
        slide.style.display = 'none'; // Ẩn tất cả các slide
    });

    slides[index].classList.add('active');
    slides[index].style.display = 'block'; // Hiện slide hiện tại
}

function changeSlide(n) {
    currentSlide += n;
    if (currentSlide >= slides.length) {
        currentSlide = 0; // Quay lại slide đầu tiên
    } else if (currentSlide < 0) {
        currentSlide = slides.length - 1; // Về slide cuối cùng
    }
    showSlide(currentSlide);
}
showSlide(currentSlide);

// Toast----------------------------------------------

function toast({title='', message = '', type = 'info', duration = 3000}) {
    const main = document.getElementById('toast');
    if (main) {
        const toast = document.createElement('div');

        //Auto remove toast
        const autoRemoveId = setTimeout(function(){
            main.removeChild(toast);
        },duration + 1000);

        //Remove toast when clicked
        toast.onclick = function(e) {
            if (e.target.closest('.toast__close')) {
                main.removeChild(toast);  
                clearTimeout(autoRemoveId);
            }
        }

        const icons = {
            success:'bi bi-check-circle-fill',
            info:'bi bi-x-circle-fill',
            error: 'ti-alert',
        };
        const icon = icons[type];
        const delay =  (duration / 1000).toFixed(2);

        toast.classList.add('toast',`toast--${type}`);
        toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
        toast.innerHTML = `
            <div class="toast__icon">
                <i class="${icon}"></i>
            </div>

            <div class="toast__body">
                <h3 class="toast__title">${title}</h3>
                <p class="toast__msg">${message}</p>
            </div>

            <div class="toast__close">
                <i class="ti-close"></i>
            </div>
        `;
        main.appendChild(toast);

        
    }

}

function showSuccessToast() {
    toast({
        title : 'Thành công',
        message : 'abc',
        type : 'success',
        duration : 5000
    });
}

function showInfoToast() {
    toast({
        title : 'Lỗi',
        message : 'Yêu cầu đăng nhập trước',
        type : 'error',
        duration : 5000
    });
}




