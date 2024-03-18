import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {

    //=========================== NAV MENU ==========================
    const btnNavMain = document.querySelector('#btn-nav-main-menu');
    const navMain = document.querySelector('#nav-main-menu');
    const navMainOverlay = document.querySelector('#nav-main-overlay');

    const toggleMobileNav = () => {
        navMain.classList.toggle('hidden');
        navMainOverlay.classList.toggle('hidden');

        if(!navMain.classList.contains('hidden')){
            navMain.classList.add('animate-wobble');
        }else{
            navMain.classList.remove('animate-wobble');
        }
    }

    navMain.addEventListener('click', () => {
        toggleMobileNav();
    });

    btnNavMain.addEventListener('click', () => {
        toggleMobileNav();
    });

    navMainOverlay.addEventListener('click', () => {
        toggleMobileNav();
    });

    // ======================== END NAV MENU ====================

    // ======================== Subscribe Form ==================
    const frmSubscribe = document.querySelector('#frm-add-subscriber');

    const animateSubscribeBtn = (flg_enable) => {
        // Toggle Animate and enable/disable submit button
        frmSubscribe.elements.submit.classList.toggle('animate-spin');
        frmSubscribe.elements.submit.disabled = flg_enable;
    }

    frmSubscribe.addEventListener('submit',(e) => {
        e.preventDefault();
        const data = new FormData(e.target);

        animateSubscribeBtn(true);

        fetch('/add-subscriber',{
            method:'POST',
            body: data
        }).then(response => response.json())
        .then(data => {
            if(data?.errors?.email[0])
                document.querySelector('#add-subsciber-message').innerHTML = data?.errors?.email[0];
            else
                document.querySelector('#add-subsciber-message').innerHTML = data.message;

            animateSubscribeBtn(false);

        }).catch(error => {
            animateSubscribeBtn(false);
        });
    });
    // ======================== END SUBSCRIBE FORM ==============

});
