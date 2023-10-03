<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khách sạn</title>
    <?php require('inc/links.php') ?>
</head>
<body class="bg-white">
    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Quản lý loại phòng</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <a href="" class="btn btn-success rounded-pill shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-room-type">
                                <i class="bi bi-file-earmark-plus"></i>Thêm loại phòng
                            </a>
                        </div>

                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll; overflow-x:scroll;">
                             <!-- Bang co so vat chat -->
                            <table class="table bg-white table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                    <th>Loại phòng</th>
                                    <th>Mô tả</th>
                                    <th></th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require('DBHelper.php');
                        
                                        $query = "select * from roomtype";
                                        $result = DBHelper::execute($query);

                                        while($result != null && $row = $result->fetch_array(MYSQLI_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['TypeName']?></td>
                                            <td><?php echo $row['Description'] ?></td>
                                            <td><a href="EditRoomType.php?id=<?php echo $row['RoomTypeId'] ?>" class="btn btn-sm rounded-pill btn-primary">Sửa</a></td>
                                            <td><a href="DeleteRoomType.php?id=<?php echo $row['RoomTypeId'] ?>" class="btn btn-sm rounded-pill btn-danger" onclick="return confirmDelete();" >Xóa</a></td>
                                        </tr>
                                        <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- form loai phong moi -->
                <div class="modal fade" id="add-room-type" data-bs-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm loại phòng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="room-type-form" method = "post" action = "AddRoomType.php" autocomplete="off">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Loại phòng:</label>
                                        <input type="text" id="room-type-name" name="room-type-name" class="mb-3" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Mô tả:</label>
                                        <input type="text" id="description" name="description" class="mb-3">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Thêm loại phòng</button>
                            </div>
                        </form>
                        </div>
                 </div>
            </div>
        </div>
    </div>
    <script>
        const open_add = document.querySelector('.js-add');
        const overlay = document.querySelector('.js-overlay');
        const close_icon = document.querySelector('.js-close');
        open_add.addEventListener('click', function (e) {
            e.preventDefault();
            content_form.style.display = 'block';
            overlay.style.display = 'block';
        });
        close_icon.addEventListener('click',function(){
            content_form.style.display = 'none';
            overlay.style.display = 'none';
        });
        function hideForm() {
            content_form.style.display = 'none';
            overlay.style.display = 'none';
        }
        function confirmDelete() {
        var result = confirm('Cảnh Báo : Nếu bạn đồng ý xóa đồng nghĩa bạn sẽ xóa các phòng có loại phòng này!Bạn có đồng ý?');
        if (result === true) {
            header("location: MyRoomType.php");
            return true;
        } else {
            return false;
        }
    }
    </script>
    <?php require('inc/scripts.php') ?>
</body>
</html>