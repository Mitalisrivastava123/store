<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light nav1">
        <a class="navbar-brand" href="home.php" style="color:#fff;">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="register.php"><span class="dash1">User Registration Page</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="userdashboard.php"><span class="dash1">User Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="userloginform.php"><span class="dash1">User Login Page</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <section class="vh-100" style="background-color: #2779e2;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <div class="col-xl-9">
                        <h1 class="text-white mb-4">ADMIN DASHBOARD</h1>
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body">
                                <div class="row align-items-center pt-4 pb-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Product Name</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="text" class="form-control form-control-lg" placeholder="enter product name" name="product_name"/>
                                    </div>
                                </div>
                                <hr class="mx-n3">
                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Product Quantity</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="number" class="form-control form-control-lg" placeholder="emter product quantity" name="product_quantity" />
                                    </div>
                                </div>
                                <hr class="mx-n3">
                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Product Price</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="number" class="form-control form-control-lg" placeholder="enter product price" name="product_price" />
                                    </div>
                                </div>
                                <hr class="mx-n3">
                                <div class="row align-items-center py-3">
                                    <div class="col-md-3 ps-5">
                                        <h6 class="mb-0">Upload Image</h6>
                                    </div>
                                    <div class="col-md-9 pe-5">
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                    </div>
                                    <hr class="mx-n3">
                                    <div class="px-5 py-4">
                                        <button type="submit" name="submit" class="btn btn-primary btn-lg">Upload Products</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    </section>
</body>
</html>