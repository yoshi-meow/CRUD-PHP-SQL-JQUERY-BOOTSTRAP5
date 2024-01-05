<nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid">
        <a class="navbar-brand fw-bolder fs-4" href="#">LSTV</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active fs-5" aria-current="page" href="menu.php">Menu</a>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle fs-4" style="color: white;"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item fw-semibold disabled" href="#" style="color: #091b0e;">Hi, <?php echo $_SESSION['username']; ?>!</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="includes/logout.php">Log Out <i class="bi bi-box-arrow-right fs-5 ms-2"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>