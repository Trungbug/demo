<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:ital,wght@0,400;0,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    <link rel="stylesheet" href="styles_index.css">
</head>
<body class = "bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
          <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="#">HOTEL</a>
          <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active me-2" aria-current="page" href="#">Trang chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link booking me-2" href="form_room.php">Đặt phòng</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link About us me-2" href="#" tabindex="-1" aria-disabled="true">About us</a>
              </li>
            </ul>
            <form class="d-flex me-2">
              <a href="login.php">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                Đăng Nhập
              </button>
              </a>
            </form>

            <form class="d-flex me-2">
            <a href="resigter.php">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">
                Đăng Ký
              </button>
              </a>
            </form>
          </div>
        </div>
      </nav>

      <div class="container-fluid px-lg-4 mt-4">
        <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" space-between="30" effect="fade"
          navigation="true">
          <swiper-slide>
            <img src="image/IMG_93127.png"/>
          </swiper-slide>
          <swiper-slide>
            <img src="image/IMG_99736.png" />
          </swiper-slide>
          <swiper-slide>
            <img src="image/IMG_93127.png" />
          </swiper-slide>
          <swiper-slide>
            <img src="image/IMG_62045.png" />
          </swiper-slide>
        </swiper-container>
      </div>

      <!-- check availability form -->
      <div class="container availability-form">
        <div class="row">
          <dv class="col-lg-12 bg-white shadow p-4 rounded">
            <h5 class = "mb-4">Tìm phòng nghỉ</h5>
            <form action="">
              <div class="row align-items-end">
                <div class="col-lg-3 mb-3">
                  <lable class="form-label" style = "font-weight: 500;">Check-in</lable>
                  <input type="date" class = "form-control shadow-none" id = "check-in" require = "true">
                </div>
                <div class="col-lg-3 mb-3">
                  <lable class="form-label" style = "font-weight: 500;">Check-out</lable>
                  <input type="date" class = "form-control shadow-none" id = "check-out" require = "true">
                </div>
                <div class="col-lg-3 mb-3">
                  <lable class="form-label" style = "font-weight: 500;">Người lớn</lable>
                  <select class="form-select shadow-none">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                </div>
                <div class="col-lg-2 mb-3">
                  <lable class="form-label" style = "font-weight: 500;">Trẻ em</lable>
                  <select class="form-select shadow-none">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
                </div>
                <div class="col-lg-1 mb-lg-3 mt-2">
                  <button type = "submit" class = "btn text-white shadow-none custom-bg">Tìm</button>
                </div>
              </div>
            </form>
          </dv>
        </div>
      </div>

    <!-- Our Rooms -->
    <h2 class = "mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>
    <div class="container">
      <div class="row">
        <!-- Room 1 -->
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="width: 350px; margin:auto; ">
              <img src="image/IMG_67761.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5>Phòng Standard</h5>
                <h6 class="mb-4">
                   500.000 VND/một đêm
                </h6>

                <div class = "features mb-4">
                  <h6 class="mb-1">Phòng gồm có:</h6>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                  2 giường
                  </span>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    1 phòng tắm
                  </span>
                   <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    ban công
                  </span>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                   3 ghế sofa
                  </span>
                </div>
                <div class="facilities mb-4">
                  <h6 class="mb-1">Vật dụng:</h6>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    Wifi
                  </span>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    Tivi
                  </span>
                   <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    Điều hòa
                  </span>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    Máy sưởi
                  </span>
                </div>

                <div class="facilities mb-4">
                  <h6 class = "mb-1">Đánh giá</h6>
                  <span class = "badge rounded-pill bg-light">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </span>
                </div>
                <div class="d-flex justify-content-evenly mb-2">
                  <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Đặt phòng ngay</a>
                  <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Thông tin chi tiết</a>
                </div>
              </div>
            </div>
        </div>

        <!-- Room 2 -->
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="width: 350px; margin:auto; ">
              <img src="image/IMG_78809.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5>Phòng Superior</h5>
                <h6 class="mb-4">
                   1.000.000 VND/một đêm
                </h6>

                <div class = "features mb-4">
                  <h6 class="mb-1">Phòng gồm có:</h6>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                  2 giường
                  </span>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    1 phòng tắm
                  </span>
                   <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    ban công
                  </span>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                   3 ghế sofa
                  </span>
                </div>
                <div class="facilities mb-4">
                  <h6 class="mb-1">Vật dụng:</h6>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    Wifi
                  </span>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    Tivi
                  </span>
                   <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    Điều hòa
                  </span>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    Máy sưởi
                  </span>
                </div>

                <div class="facilities mb-4">
                  <h6 class = "mb-1">Đánh giá</h6>
                  <span class = "badge rounded-pill bg-light">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </span>
                </div>
                <div class="d-flex justify-content-evenly mb-2">
                  <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Đặt phòng ngay</a>
                  <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Thông tin chi tiết</a>
                </div>
              </div>
            </div>
        </div>

        <!-- Room 3 -->
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card border-0 shadow" style="width: 350px; margin:auto; ">
              <img src="image/IMG_39782.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5>Phòng Suite</h5>
                <h6 class="mb-4">
                   2.000.000 VND/một đêm
                </h6>

                <div class = "features mb-4">
                  <h6 class="mb-1">Phòng gồm có:</h6>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                  2 giường
                  </span>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    1 phòng tắm
                  </span>
                   <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    ban công
                  </span>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                   3 ghế sofa
                  </span>
                </div>
                <div class="facilities mb-4">
                  <h6 class="mb-1">Vật dụng:</h6>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    Wifi
                  </span>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    Tivi
                  </span>
                   <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    Điều hòa
                  </span>
                  <span class = "badge rounded-pill bg-light text-dark text-wrap">
                    Máy sưởi
                  </span>
                </div>

                <div class="facilities mb-4">
                  <h6 class = "mb-1">Đánh giá</h6>
                  <span class = "badge rounded-pill bg-light">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                  </span>
                </div>
                <div class="d-flex justify-content-evenly mb-2">
                  <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Đặt phòng ngay</a>
                  <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Thông tin chi tiết</a>
                </div>
              </div>
            </div>
        </div>

        <div class="col-lg-12 text-center mt-5">
            <a href="form_room.php" class= "btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms >>></a>
        </div>
      </div>
    </div>

    <!-- Reach us -->
    <h2 class = "mt-5 pt-4 mb-4 text-center fw-bold h-font">Địa chỉ</h2>
    <div class="container">
      <div class="row">
        <div class = "col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
          <iframe class = "w-100 rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.5777251005984!2d105.82449667479463!3d20.969466589813376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acf8cb3861d9%3A0xd294605a751a1c4a!2zTcaw4budbmcgVGhhbmggR3JhbmQgSG90ZWw!5e0!3m2!1sen!2s!4v1692437429671!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <!-- Phone -->
        <div class = "col-lg-4 col-md-4">
          <div class="bg-white p-4 rounded mb-4">
            <h5>Call us</h5>
            <a href="tel: +84123456789" class = "d-inline-block mb-2 text-decoration-none text-dark">
              <i class="bi bi-telephone-fill"></i>+84123456789
            </a>
          </div>
          
          <!-- Twitter -->
          <div class="bg-white p-4 rounded mb-4">
            <h5>Follow us</h5>
            <a href="#" class = "d-inline-block mb-3">
              <span class = "badge bg-light text-dark fs-6 p-2">
                <i class="bi bi-twitter me-1"></i>Twitter
              </span>
            </a>
            <br>
            <a href="#" class = "d-inline-block mb-3">
              <span class = "badge bg-light text-dark fs-6 p-2">
                <i class="bi bi-facebook"></i> Facebook
              </span>
            </a>
            <br>
            <a href="#" class = "d-inline-block mb-3">
              <span class = "badge bg-light text-dark fs-6 p-2">
                <i class="bi bi-instagram"></i></i> Instagram
              </span>
            </a>

          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <div class="container-fluid bg-white mt-5">
      <div class="row">
        <h1 style="color: #333; text-align: center; margin-top: 50px;">Cảm ơn đã ghé thăm trang web của chúng tôi</h1>
        <p style="font-size: 16px; line-height: 1.5; color: #666; margin: 10px 0; text-align: center;">
            Footer - Khách sạn Mường Thanh
        </p>
        <p style="font-size: 16px; line-height: 1.5; color: #666; margin: 10px 0; text-align: center;">
          Cảm ơn bạn đã ghé thăm Khách sạn của chúng tôi.
        </p>

        <p style="font-size: 16px; line-height: 1.5; color: #666; margin: 10px 0; text-align: center;">
           Địa chỉ: 23 Nghiêm Xuân Yêm, Thanh Liệt, Thanh Trì, Hà Nội
        </p>
        <p style="font-size: 16px; line-height: 1.5; color: #666; margin: 10px 0; text-align: center;">
           SĐT: 0123 456 789 | Email: hotelmuongthanh@gmail.com
        </p>
        <footer style="background-color: #333; color: #fff; padding: 20px; text-align: center;">
            &copy; 2023 Trang web của chúng tôi. Tất cả các quyền được bảo lưu.
        </footer>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
    <script>
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
          delay: 3500,
          disableOnInteraction: false,
        }
      });
    </script>
    <script src = "main.js" ></script>
  </body>
</html>