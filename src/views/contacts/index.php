<?php
require_once 'views/layout/header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$showAlertCreate = isset($_SESSION['showAlertCreate']) ? $_SESSION['showAlertCreate'] : false;
$showAlertUpdate = isset($_SESSION['showAlertUpdate']) ? $_SESSION['showAlertUpdate'] : false;
$showAlertDelete = isset($_SESSION['showAlertDelete']) ? $_SESSION['showAlertDelete'] : false;

// Limpiar las variables de sesión después de mostrarlas
unset($_SESSION['showAlertCreate']);
unset($_SESSION['showAlertUpdate']);
unset($_SESSION['showAlertDelete']);
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.min.js"></script>

<body
    data-alert-create="<?php echo $showAlertCreate ? 'true' : 'false'; ?>"
    data-alert-update="<?php echo $showAlertUpdate ? 'true' : 'false'; ?>"
    data-alert-delete="<?php echo $showAlertDelete ? 'true' : 'false'; ?>">

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Contact List</h1>
            <a href="index.php?action=create" class="btn btn-primary">Add New Contact</a>
        </div>

        <div class="mb-4">
            <form action="index.php" method="GET" class="d-flex">
                <input type="hidden" name="action" value="search">
                <input type="text" name="keyword" class="form-control me-2" placeholder="Search contacts...">
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Last name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if (isset($contacts)) {
                        foreach ($contacts as $row) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row->first_name); ?></td>
                                <td><?php echo htmlspecialchars($row->last_name); ?></td>
                                <td><?php echo htmlspecialchars($row->phone); ?></td>
                                <td><?php echo htmlspecialchars($row->email); ?></td>
                                <td>
                                    <a href="index.php?action=edit&id=<?php echo $row->id; ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="index.php?action=delete&id=<?php echo $row->id; ?>"
                                        class="btn btn-sm btn-danger"
                                        data-action="delete">
                                        Delete</a>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="assets/js/alerts.js"></script>
<script src="assets/js/delete.js"></script>

<?php require_once 'views/layout/footer.php'; ?>