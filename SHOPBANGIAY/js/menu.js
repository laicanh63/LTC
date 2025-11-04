const searchBox = document.getElementById('search-box');

searchBox.addEventListener('focus', function () {
    this.style.width = '200px'; // Khi ô tìm kiếm được focus, thay đổi độ rộng
});

searchBox.addEventListener('blur', function () {
    if (this.value === '') {
        this.style.width = '50px'; // Khi ô tìm kiếm mất focus và trống, trở lại độ rộng mặc định
    }
});
