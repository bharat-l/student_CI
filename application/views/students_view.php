<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets/css/student_view.css') ?>" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?= base_url('/assets/images/login.png'); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=delete" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=edit_square" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
    <div class="sidebar">
        <h4 class="text-center">Students Portal</h4>
        <hr style="background-color: #555;">
        <a href="<?= base_url('StudentController/dashboard'); ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="<?= base_url('StudentController/profiles'); ?>"><i class="fas fa-user-graduate"></i> Student Information</a>
        <a href="<?= base_url('StudentController/results'); ?>"><i class="fas fa-file-alt"></i> Results</a>
        <a href="<?= base_url('StudentController/library'); ?>"><i class="fas fa-book"></i> Library</a>
        <a href="<?= base_url('StudentController/attendance'); ?>"><i class="fas fa-calendar-check"></i> Attendance</a>
    </div>
    <div class="container mt-5">
        <h2>STUDENT FORM</h2>
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
                    <div class="form-group">
                        <form id="uploadForm" enctype="multipart/form-data">
                            <label for="document"> Student Photo </label>
                            <input type="file" id="imageInput" name="filename" class="form-control" accept="image/*" onchange="uploadImage()">
                            <div id="preview">
                                <!-- The image preview will be displayed here -->
                            </div>
                        </form>
                    </div>
                </div>
                    <div class="submit-btn mt-3">
                        <button type="submit" value="submit" name="submit" class="btn btn-primary px-4">SUBMIT</button>
                        <button type="reset" name="clear" class="btn btn-secondary px-4">CLEAR</button>
                    </div>
            </div>
            <?php
            if (isset($_FILES["filename"])) {
                // Display the uploaded image
                echo '<img src="uploads/' . htmlspecialchars(basename($_FILES["filename"]["name"])) . '" alt="Uploaded Image" style="max-width: 200px;">';
            }
            ?>
        </form>
        <script>
            function uploadImage() {
                var formData = new FormData(document.getElementById("uploadForm"));
                var xhr = new XMLHttpRequest();

                xhr.open("POST", "upload.php", true);

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // console.log(xhr);
                        // If upload is successful, show the image preview
                        document.getElementById("preview").innerHTML = '<img src="' + xhr.responseText + '" alt="Image Preview" width="300"/>';
                    } else {
                        alert("Image upload failed!");
                    }
                };

                xhr.send(formData);
            }
        </script>

        <!-- Student table -->
        <div id="data">
            <h3> STUDENTS DATA </h3>
        </div>
        <table id="studenttbl" class="display" style="width:100%">
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
                            <a href="<?= base_url('StudentController/edit/' . $student['id']); ?>" class="btn btn-info">
                                <span class="material-icons-outlined">edit</span>
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteId(<?= $student['id']; ?>)">
                                <span class="material-icons-outlined">delete</span>
                            </button>
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
            // Initialize DataTable
            $('#studenttbl').DataTable({
                "pagingType": "simple_numbers", // Use full_numbers pagination style
                "lengthChange": true, // Allow changing the number of rows displayed
                "searching": true, // Enable search/filter box
                "ordering": true, // Enable column sorting
                "info": true, // Show table information summary
                "autoWidth": false, // Disable automatic column width calculation
                "pageLength": 10, // Default number of rows per page
                "columnDefs": [{
                        "orderable": false,
                        "targets": -1
                    } // Disable sorting on the last column (Actions)
                ],

            });
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