<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LSTV | CRUD</title>
    <!-- Include Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Include Google Font (Poppins) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&family=Space+Grotesk:wght@400;500&display=swap" rel="stylesheet">
    <!-- Include DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
    <!-- Include Style CSS -->
    <link rel="stylesheet" href="assets/index.css">
    <style>
        /* Custom style remove input number arrow */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        /* Custom style for DataTables pagination */
        .pagination .page-link {
            color: gray;
        }
        .pagination .page-item.active .page-link {
            background-color: #45BA6C;
            border-color: #45BA6C;
            color: white;
        }
        /* Custom style for required label */
        .asterisk {
            color: #e7433f;
        }
        /* Custom style for text color */
        .text-primary {
            color: #45BA6C !important;
        }
        /* Custom style for background and color */
        .bg-image {
            background: url('assets/bg-pattern.png');
            background-size: contain, cover;
        }
        .custom-bg {
            background-color: #f8fcf9 !important;
        }
    </style>
</head>

<body>