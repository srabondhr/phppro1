
document.addEventListener("DOMContentLoaded", () => {
    const notices = document.querySelectorAll('.notice');
    notices.forEach(notice => {
        setTimeout(() => {
            notice.style.display = 'none';
        }, 3000); 
    });
});
