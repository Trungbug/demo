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
                <h3 class="mb-4">Quản lý phòng</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <a href="" class="btn btn-success rounded-pill shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#addRoom">
                                <i class="bi bi-file-earmark-plus"></i>Thêm phòng
                            </a>
                        </div>

                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll; overflow-x:scroll;">
                             <!-- Bang phong -->
                            <table class="table bg-white table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                    <th>Tên Phòng</th>
                                    <th>Loại Phòng</th>
                                    <th>Hình ảnh</th>
                                    <th>Giá một đêm</th> 
                                    <th>Diện tích</th>
                                    <th>Số người ở</th>
                                    <th>Mô tả</th> 
                                    <th>Trạng thái</th>
                                    <th></th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require('DBHelper.php');
                        
                                        $query = "select * from room";
                                        $result = DBHelper::execute($query);

                                        while($result != null && $row = $result->fetch_array(MYSQLI_ASSOC)) {
                                            $res = DBHelper::execute("select * from roomtype where RoomTypeId = {$row['RoomTypeId']}");
                                            if($res != null) {
                                                while($res != null && $value = $res->fetch_array(MYSQLI_ASSOC)) {
                                                    $typeName = $value['TypeName'];
                                                    $description = $value['Description']; 
                                                }
                                            }
                                        ?>
                                        <tr>
                                            <td><?php echo $row['RoomName']?></td>
                                            <td><?php echo $typeName ?></td>
                                            <td><?php echo '<img src="data:image;base64,' . base64_encode($row['Image']) . '" alt="Image" style="width: 100px; height: 100px;">' ?></td>
                                            <td><?php echo number_format($row['PricePerNight'], 0, '.', ',') . 'đ' ?></td>
                                            <td><?php echo $row['Area'] ?></td>
                                            <td><?php echo $row['Quantity'] ?></td>
                                            <td><?php echo $description ?></td>
                                            <td><?php echo $row['status'] ?></td>
                                            <td><a href="EditRoom.php?roomId=<?php echo $row['RoomId'];?>" class="btn btn-sm rounded-pill btn-primary">Sửa</a></td>
                                            <td><a href="DeleteRoom.php?roomId=<?php echo $row['RoomId'];?>" class="btn btn-sm rounded-pill btn-danger" onclick="return confirmDelete();" >Xóa</a></td>
                                        </tr>
                                        <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- form them phong moi -->
                <div class="modal fade" id="addRoom" data-bs-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm phòng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <form id="room-form" method = "post" action = "AddRoom.php" autocomplete="off">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="room-name"class="form-label fw-bold">Tên Phòng:</label>
                                        <input type="text" id="room-name" name="room-name" class="mb-3" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="room-type" class="form-label fw-bold">Loại phòng</label>
                                        <select id="room-type" name="room-type" class="mb-3" required>
                                            <?php
                                                $query = "select * from roomtype";
                                                $result = DBHelper::execute($query);
                                                while($result != null && $row = $result->fetch_array(MYSQLI_ASSOC)) {
                                            ?>
                                                <option><?php echo $row['TypeName']?></option>
                                            <?php 
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="room-image" class="mb-2">Hình ảnh:</label>
                                        <input type="file" id="room-image" name="room-image" accept="image/*" class="mb-3" required>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="room-price" class="form-label fw-bold">Giá một đêm:</label>
                                        <input type="number" id="room-price" name="room-price"  class="mb-3" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="room-area" class="form-label fw-bold">Diện tích:</label>
                                        <input type="number" id="room-area" name="room-area"  class="mb-3" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="room-max-guests" class="form-label fw-bold">Số người ở tối đa:</label>
                                        <input type="number" id="room-max-guests" name="room-max-guests" min="1" value="1"  class="mb-3" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="room-status" class="form-label fw-bold">Trạng Thái:</label>
                                        <select id="room-status" name="room-status" class="mb-3" required>
                                            <option value="Trống">Trống</option>
                                            <option value="Bảo trì">Bảo trì</option>
                                            <option value="Đang ở">Đang ở</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <label class="form-label fw-bold">Cơ sở vật chất</label>
                                        <div class="row">
                                            <?php
                                                $truyvan = "select * from hotel_management.facilities";
                                                $ketqua = DBHelper::execute($truyvan);
                                                while($hang = $ketqua->fetch_array(MYSQLI_ASSOC)) {
                                                    echo "
                                                        <div class = 'col-md-3'>
                                                            <label>
                                                                <input type='checkbox' name='features[]' value='$hang[name]' class='form-check-input shadow-none'>
                                                                $hang[name]
                                                            </label>
                                                        </div>
                                                    ";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Thêm phòng</button>
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
        var result = confirm('Cảnh Báo : Bạn có muốn xóa phòng?');
        if (result === true) {
            header("location: MyRoom.php");
            return true;
        } else {
            return false;
        }
    }
    </script>
    <?php require('inc/scripts.php') ?>
</body>
</html>