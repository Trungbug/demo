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
                <h3 class="mb-4">Quản lý cơ sở vật chất</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">

                        <div class="text-end mb-4">
                            <a href="" class="btn btn-success rounded-pill shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#add-facilities">
                                <i class="bi bi-file-earmark-plus"></i>Thêm cơ sở vật chất
                            </a>
                        </div>

                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll; overflow-x:scroll;">
                             <!-- Bang co so vat chat -->
                            <table class="table bg-white table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                    <th>Cơ sở vật chất</th>
                                    <th>Số lượng</th>
                                    <th>Giá tiền</th>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require('DBHelper.php');
                        
                                        $query = "select * from facilities";
                                        $result = DBHelper::execute($query);

                                        while($result != null && $row = $result->fetch_array(MYSQLI_ASSOC)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['name']?></td>
                                            <td><?php echo $row['quantity'] ?></td>
                                            <td><?php echo number_format($row['price'], 0, '.', ',') . 'đ' ?></td>
                                            <td><?php echo number_format($row['TotalPrice'], 0, '.', ',') . 'đ' ?></td>
                                            <td><a href="EditFacilities.php?id=<?php echo $row['id'] ?>" class="btn btn-sm rounded-pill btn-primary">Sửa</a></td>
                                            <td><a href="DeleteFacilities.php?id=<?php echo $row['id'] ?>" class="btn btn-sm rounded-pill btn-danger">Xóa</a></td>
                                        </tr>
                                        <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- form co so vat chat moi -->
                <div class="modal fade" id="add-facilities" data-bs-keyboard="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm cơ sở vật chất</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="facilities-form" method = "post" action = "AddFacilities.php" autocomplete="off">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="facilities-name"class="form-label fw-bold">Tên Cơ sở vật chất:</label>
                                        <input type="text" id="facilities-name" name="facilities-name" class="mb-3" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="quantity" class="form-label fw-bold">Số lượng:</label>
                                        <input type="number" id="quantity" name="quantity" class="mb-3" required>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="quantity" class="form-label fw-bold">Giá tiền:</label>
                                        <input type="number" id="price" name="price" class="mb-3" required>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Thêm cơ sở vật chất</button>
                            </div>
                        </form>
                        </div>
                 </div>
            </div>
        </div>
    </div>
    <?php require('inc/scripts.php') ?>
</body>
</html>