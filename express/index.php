<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta http-equiv="refresh" content="30">
    <title>ปัณณ์จรีย์ v.0.1 Beta</title>
    <!-- CSS files -->
    <link href="../dist/css/tabler.min.css" rel="stylesheet" />
    <link href="../dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="../dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="../dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="../dist/css/demo.min.css" rel="stylesheet" />

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
</head>

<body class="antialiased">


    <div class="wrapper">
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="../">
                        <img src="../static/logo.svg" width="150" height="35" alt="{logo_brand_alt}" class="navbar-brand-image">
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item d-none d-md-flex me-3">

                    </div>

                    <!-- member dropdown -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <span class="avatar avatar-sm" style="background-image: url(../static/avatars/worapot.jpg)"></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>Worapot Bhilabura</div>
                                <div class="mt-1 small text-muted">Creative Design Apps</div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </header>
        <div class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar navbar-light">
                    <div class="container-xl">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="../index.php">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Home
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../agents/index.php">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">

                                        <!-- Download SVG icon from http://tabler-icons.io/i/3d-cube-sphere -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M6 17.6l-2 -1.1v-2.5" />
                                            <path d="M4 10v-2.5l2 -1.1" />
                                            <path d="M10 4.1l2 -1.1l2 1.1" />
                                            <path d="M18 6.4l2 1.1v2.5" />
                                            <path d="M20 14v2.5l-2 1.12" />
                                            <path d="M14 19.9l-2 1.1l-2 -1.1" />
                                            <line x1="12" y1="12" x2="14" y2="10.9" />
                                            <line x1="18" y1="8.6" x2="20" y2="7.5" />
                                            <line x1="12" y1="12" x2="12" y2="14.5" />
                                            <line x1="12" y1="18.5" x2="12" y2="21" />
                                            <path d="M12 12l-2 -1.12" />
                                            <line x1="6" y1="8.6" x2="4" y2="7.5" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        ข้อมูลตัวแทน
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../customers/index.php">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">

                                        <!-- Download SVG icon from http://tabler-icons.io/i/woman -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="12" cy="5" r="2" />
                                            <path d="M10 22v-4h-2l2 -6a1 1 0 0 1 1 -1h2a1 1 0 0 1 1 1l2 6h-2v4" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        ข้อมูลลูกค้า
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="../products/index.php">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-codesandbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M20 7.5v9l-4 2.25l-4 2.25l-4 -2.25l-4 -2.25v-9l4 -2.25l4 -2.25l4 2.25z"></path>
                                            <path d="M12 12l4 -2.25l4 -2.25"></path>
                                            <line x1="12" y1="12" x2="12" y2="21"></line>
                                            <path d="M12 12l-4 -2.25l-4 -2.25"></path>
                                            <path d="M20 12l-4 2v4.75"></path>
                                            <path d="M4 12l4 2l0 4.75"></path>
                                            <path d="M8 5.25l4 2.25l4 -2.25"></path>
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        สินค้า-ปัณณ์จรีย์
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="../orders/index.php">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <polyline points="7 10 12 4 17 10"></polyline>
                                            <path d="M21 10l-2 8a2 2.5 0 0 1 -2 2h-10a2 2.5 0 0 1 -2 -2l-2 -8z"></path>
                                            <circle cx="12" cy="15" r="2"></circle>
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        สั่งสินค้า
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../express/index.php">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="7" cy="17" r="2"></circle>
                                            <circle cx="17" cy="17" r="2"></circle>
                                            <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                                            <line x1="3" y1="9" x2="7" y2="9"></line>
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        ส่งสินค้า
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="../services-support/index.php">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <line x1="12" y1="17" x2="12" y2="17.01"></line>
                                            <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4"></path>
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        ช่วยเหลือ
                                    </span>
                                </a>
                            </li>





                        </ul>
                        <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                            <form action="{search}" method="get">
                                <div class="input-icon">
                                    <span class="input-icon-addon">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="10" cy="10" r="7" />
                                            <line x1="21" y1="21" x2="15" y2="15" />
                                        </svg>
                                    </span>
                                    <input type="text" name="key" class="form-control" placeholder="Search…" aria-label="Search in website">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="page-wrapper">


            <!-- เพิ่มรายการใหม่ Modal Start -->
            <div class="modal modal-blur fade" tabindex="-1" id="addNewUserModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">รายการส่งสินค้า</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="add-user-form" class="p-2" novalidate>


                                <div class="row mb-3 gx-3 text-minute">
                                    <div class="col">
                                        <input type="text" name="sname" class="form-control form-control-lg" placeholder="คนส่ง" required>
                                        <div class="invalid-feedback">กรุณาใส่ชื่อผู้ส่ง!</div>
                                    </div>

                                    <div class="col">
                                        <input type="text" name="sphone" class="form-control form-control-lg" placeholder="เบอร์คนส่ง" required>
                                        <div class="invalid-feedback">กรุณาใส่เบอร์ผู้ส่ง!</div>
                                    </div>
                                </div>

                                <div class="row mb-3 gx-3 text-minute">
                                    <div class="col">
                                        <input type="text" name="rname" class="form-control form-control-lg" placeholder="ผู้รับ" required>
                                        <div class="invalid-feedback">กรุณาใส่ชื่อผู้รับ!</div>
                                    </div>

                                    <div class="col">
                                        <input type="text" name="rphone" class="form-control form-control-lg" placeholder="เบอร์ผู้รับ" required>
                                        <div class="invalid-feedback">กรุณาใส่ชื่อผู้รับ!</div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <input type="tel" name="code" class="form-control form-control-lg" placeholder="รหัสติดตาม" required>
                                    <div class="invalid-feedback">Phone is required!</div>
                                </div>
                                <div class="row mb-3 gx-3 text-minute">
                                    <div class="col">
                                        <div class="form-label">ส่งโดย</div>
                                        <select class="form-select" name="provider">
                                            <option value="FLA" selected>FLASH EXPRESS</option>
                                            <option value="THP">ไปรษณี์ไทย</option>
                                            <option value="KRY">Kerry Express</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <div class="form-label">วันที่ส่ง</div>
                                        <input type="text" name="tdate" class="form-select" placeholder="2021-11-25" required>
                                        <div class="invalid-feedback">ส่งวันที่!</div>
                                    </div>
                                </div>
                                <div class="row mb-3 gx-3 text-minute">
                                    <div class="col">
                                        <div class="form-label">codระบุตัวเลข</div>
                                        <input type="text" name="cod" class="form-control form-control-lg" placeholder="00">
                                        <div class="invalid-feedback">ระบุตัวเลข</div>
                                    </div>
                                    <div class="col">
                                        <div class="form-label">Wallet ระบุเบอร์โทร</div>
                                        <input type="text" name="wallet" class="form-control form-control-lg" placeholder="00">
                                        <div class="invalid-feedback">!</div>
                                    </div>
                                </div>



                                <div class="mb-3">
                                    <input type="submit" name="action" value="save" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
                                </div>
                        </div>





                        </form>
                    </div>
                </div>
            </div>


            <!-- เพิ่มรายการใหม่ Modal Start -->
            <div class="modal modal-blur fade" tabindex="-1" id="addNewMulti">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">รายการส่งสินค้า</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="add-user-form" class="p-2" novalidate>


                                <div class="row mb-3 gx-3 text-minute">
                                    <textarea rows="5" class="form-control form-control-lg" name="sname" placeholder="2021-12-20,TH00010101,คนส่ง,เบอร์โทรคนส่ง,คนรับ,เบอร์โทรคนรับ,จำนวนเงิน,wallet"></textarea>
                                </div>





                                <div class="mb-3">
                                    <input type="submit" name="action" value="save" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
                                </div>
                        </div>





                        </form>
                    </div>
                </div>
            </div>


        </div>
        <!-- เพิ่มรายการใหม่ Modal End -->

        <!-- แก้ไขรายการ Modal Start -->
        <div class="modal fade" tabindex="-1" id="editUserModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">แก้ไขข้อมูลส่งสินค้า</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-user-form" class="p-2" novalidate>
                            <input type="hidden" name="id" id="id">
                            <div class="row mb-3 gx-3 text-minute">
                                <div class="col">
                                    <input type="text" name="sname" id="sname" class="form-control form-control-lg" placeholder="คนส่ง" required>
                                    <div class="invalid-feedback">กรุณาใส่ชื่อผู้ส่ง!</div>
                                </div>

                                <div class="col">
                                    <input type="text" name="sphone" id="sphone" class="form-control form-control-lg" placeholder="เบอร์คนส่ง" required>
                                    <div class="invalid-feedback">กรุณาใส่เบอร์ผู้ส่ง!</div>
                                </div>
                            </div>

                            <div class="row mb-3 gx-3 text-minute">
                                <div class="col">
                                    <input type="text" name="rname" id="rname" class="form-control form-control-lg" placeholder="ผู้รับ" required>
                                    <div class="invalid-feedback">กรุณาใส่ชื่อผู้รับ!</div>
                                </div>

                                <div class="col">
                                    <input type="text" name="rphone" id="rphone" class="form-control form-control-lg" placeholder="เบอร์ผู้รับ" required>
                                    <div class="invalid-feedback">กรุณาใส่เบอร์ผู้รับ!</div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="tel" name="code" id="code" class="form-control form-control-lg" placeholder="รหัสติดตาม" required>
                                <div class="invalid-feedback">รหัสติดตาม!</div>
                            </div>
                            <div class="row mb-3 gx-3 text-minute">
                                <div class="col">
                                    <div class="form-label">ส่งโดย</div>
                                    <select class="form-select" name="provider" id="provider">
                                        <option value="FLA" selected>FLASH EXPRESS</option>
                                        <option value="THP">ไปรษณี์ไทย</option>
                                        <option value="KRY">Kerry Express</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="form-label">วันที่ส่ง</div>
                                    <input type="text" name="tdate" id="tdate" class="form-control form-control-lg">
                                    <div class="invalid-feedback">ส่งวันที่!</div>
                                </div>
                            </div>
                            <div class="row mb-3 gx-3 text-minute">
                                <div class="col">
                                    <div class="form-label">cod ระบุตัวเลข</div>
                                    <input type="text" name="cod" id="cod" class="form-control form-control-lg" placeholder="00">
                                    <div class="invalid-feedback">ระบุตัวเลข</div>
                                </div>
                                <div class="col">
                                    <div class="form-label">Wallet ระบุเบอร์โทร</div>
                                    <input type="text" name="wallet" id="wallet" class="form-control form-control-lg" placeholder="00">
                                    <div class="invalid-feedback">!</div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="submit" value="แก้ไข" class="btn btn-success btn-block btn-lg" id="edit-user-btn">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- แก้ไขรายการ Modal End -->





        <div class="container">
            <div class="row mt-4">
                <div class="col-lg-12 d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="text-primary">รายการส่งสินค้า(ออนไลน์)</h2>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewMulti">เพิ่มหลายรายการ</button>
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewUserModal">เพิ่มรายการ</button>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-12">

                    <div id="showAlert"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>วันที่ส่ง</th>
                                    <th>
                                        <a href='exupdate.php' class="btn btn-primary">สถานะ </a>
                                    </th>
                                    <th>Express/Track</th>
                                    <th>COD</th>
                                    <th>ผู้ส่ง</th>
                                    <th>ผู้รับ</th>
                                    <th>ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>













    <footer class="footer footer-transparent d-print-none">
        <div class="container">
            <div class="row text-center align-items-center flex-row-reverse">
                <div class="col-lg-auto ms-lg-auto">
                    <ul class="list-inline list-inline-dots mb-0">

                        <li class="list-inline-item">
                            <a href="" target="_blank" class="link-secondary" rel="noopener">

                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                </svg> อ.พี่เอก
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                    <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                            Copyright © Pajaree Office.
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </footer>

    </div>




    <!-- Tabler Core -->
    <script src="main.js"></script>
    <!-- Tabler Core -->
    <script src="../dist/js/tabler.min.js"></script>

</body>

</html>