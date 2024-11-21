<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets/css/student_view.css') ?>" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?= base_url('/assets/images/login.png'); ?>">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>
<div class="container mt-5">
    <h2>STUDENT DATA</h2>
    <form action="<?= base_url('StudentController/submit'); ?>" method="POST" id="textForm" autocomplete="off" enctype="multipart/form-data">
        <div class="form-container">
            <div class="inner-container">
                <!-- Form inputs -->
                <div class="form-group">
                    <label for="studentName">Student name<span class="req-star errortext">*</span></label>
                    <input type="text" class="form-control" name="StudentName" maxlength="30" pattern="[A-Za-z\s]+" placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                    <label for="fatherName">Father name<span class="req-star errortext">*</span></label>
                    <input type="text" class="form-control" name="FatherName" maxlength="30" pattern="[A-Za-z\s]+" placeholder="Enter father name" required>
                </div>
                <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text" class="form-control" name="Address" placeholder="Enter full address" required>
                </div>
                <div class="form-group">
                    <label for="Phnumber">Phone number<span class="req-star errortext">*</span></label>
                    <input type="tel" class="form-control" name="Phnumber" placeholder="Enter phone number" maxlength="10" required>
                </div>
                <div class="form-group">
                    <label for="Marks">Marks<span class="req-star errortext">*</span></label>
                    <input type="number" class="form-control" name="Marks" placeholder="Enter your marks" maxlength="3" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address<span class="req-star errortext">*</span></label>
                    <input type="email" class="form-control" name="Email" placeholder="Enter your mail address" maxlength="50" required>
                </div>
                <div class="submit-btn mt-3">
                    <button type="submit" value="submit" name="submit" class="btn btn-primary px-4">SUBMIT</button>
                    <button type="reset" name="clear" class="btn btn-secondary px-4">CLEAR</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Student table -->
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Student name</th>
                <th>Father name</th>
                <th>Address</th>
                <th>Phone number</th>
                <th>Marks</th>
                <th>Email address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= htmlspecialchars($student['student_name']); ?></td>
                    <td><?= htmlspecialchars($student['Father_name']); ?></td>
                    <td><?= htmlspecialchars($student['address']); ?></td>
                    <td><?= htmlspecialchars($student['phone_number']); ?></td>
                    <td><?= htmlspecialchars($student['marks']); ?></td>
                    <td><?= htmlspecialchars($student['email_address']); ?></td>
                    <td>
                        <a href="<?= base_url('StudentController/edit/' . $student['id']); ?>" class="btn btn-info">Edit</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteId(<?= $student['id']; ?>)">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination">
        <?php for ($i = 1; $i <= ceil($total_rows / 10); $i++): ?>
            <a href="<?= base_url('StudentController/index?page=' . $i); ?>"><?= $i; ?></a>
        <?php endfor; ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    let deleteId = null;

    function setDeleteId(id) {
        deleteId = id;
    }

    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if (deleteId) {
            window.location.href = "<?= base_url('StudentController/delete/'); ?>" + deleteId;
        }
    });
</script>
</body>
</html>