// Lấy tham chiếu đến nút "Thêm Phòng" và biểu mẫu thêm phòng
const addButton = document.querySelector('.add-button');
const addRoomForm = document.querySelector('.add-room-form');

// Lắng nghe sự kiện khi nút "Thêm Phòng" được nhấn
addButton.addEventListener('click', () => {
    addRoomForm.style.display = 'block'; // Hiển thị biểu mẫu thêm phòng
});

// Lấy tham chiếu đến nút "Hủy" trong biểu mẫu
const cancelButton = document.querySelector('.cancel-button');

// Lắng nghe sự kiện khi nút "Hủy" được nhấn
cancelButton.addEventListener('click', () => {
    addRoomForm.style.display = 'none'; // Ẩn biểu mẫu thêm phòng
});
