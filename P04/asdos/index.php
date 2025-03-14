<?php
require_once 'BukuTamu.php';
require_once 'form.php';

session_start();

if (!isset($_SESSION['buku_tamu'])) {
    $_SESSION['buku_tamu'] = [];
}

if (isset($_POST['submit'])) {
    $bukuTamu = new BukuTamu();
    $bukuTamu->timestamp = date('Y-m-d H:i:s');
    $bukuTamu->fullName = $_POST['fullName'];
    $bukuTamu->email = $_POST['email'];
    $bukuTamu->message = $_POST['message'];

    array_push($_SESSION['buku_tamu'], $bukuTamu);
    header('Location: index.php');
}

if (isset($_POST['deleteAll'])) {
    $_SESSION['buku_tamu'] = [];
}

if (isset($_POST['delete'])) {
    $keyItem = $_POST['delete'];
    unset($_SESSION['buku_tamu'][$keyItem]);
    $_SESSION['buku_tamu'] = array_values($_SESSION['buku_tamu']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row mt-5 justify-content-between">
            <h2 class="col-auto">Entries</h2>
            <div class="col-auto d-flex gap-2">
                <div class="div">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        ADD
                    </button>
                </div>
                <form action="" method="post">
                    <button type="submit" name="deleteAll" class="btn btn-danger">DELETE ALL</button>
                </form>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Timestamp</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['buku_tamu'] as $key => $entry): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($entry->timestamp); ?></td>
                        <td><?php echo htmlspecialchars($entry->fullName); ?></td>
                        <td><?php echo htmlspecialchars($entry->email); ?></td>
                        <td><?php echo htmlspecialchars($entry->message); ?></td>
                        <td>
                            <form action="" method="post">
                                <button type="submit" name="delete" value="<?= $key;?>" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
