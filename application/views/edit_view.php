<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Students Data</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/css/jscsspage.css'); ?>"> -->
    <!-- <script type="text/javascript" src="<?= base_url('assets/js/toastify.min.js'); ?>"></script> -->
    <link rel="stylesheet" href="<?= base_url('/assets/css/student_edit.css'); ?>">
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>

<body>
    <div class="sidebar">
        <h4 class="text-center">Students Portal</h4>
        <hr style="background-color: #555;">
        <a href="<?= base_url('DashboardController'); ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="<?= base_url('StudentController/profiles'); ?>"><i class="fas fa-user-graduate"></i> Student Information</a>
        <a href="<?= base_url('StudentController/results'); ?>"><i class="fas fa-file-alt"></i> Results</a>
        <a href="<?= base_url('LibraryController'); ?>"><i class="fas fa-book"></i> Library</a>
        <a href="<?= base_url('StudentController/attendance'); ?>"><i class="fas fa-calendar-check"></i> Attendance</a>
    </div>
   

    <div class="container">
        <form action="<?= base_url('studentEdit/update') ?>" method="POST" id="textForm" name="formList" autocomplete="off">
            <input type="hidden" name="id" value="<?= htmlspecialchars($student['id']) ?>">
            <h2>STUDENT EDIT FORM</h2>
            <div class="form-container">
                <div class="form-group">
                    <label for="studentName">Student name<span class="req-star errortext" style="color: red;">*</span></label>
                    <input type="text" id="textfields" name="StudentName" value="<?= htmlspecialchars($student['student_name']) ?>" maxlength="30" pattern="[A-Za-z\s]+" placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                    <label for="fatherName">Father name<span class="req-star errortext" style="color: red;">*</span></label>
                    <input type="text" id="textfields" name="FatherName" value="<?= htmlspecialchars($student['Father_name']) ?>" maxlength="30" pattern="[A-Za-z\s]+" placeholder="Enter father name" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender<span class="req-star errortext" style="color: red;">*</span></label>
                    <select class="form-control" name="gender" value="<?= htmlspecialchars($student['gender']) ?>" required>
                        <option value="">Select gender</option>
                        <option value="Male" <?= $student['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= $student['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                        <option value="Other" <?= $student['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dateOfBirth">Date of Birth<span class="req-star errortext" style="color: red;">*</span></label>
                    <input type="date" class="form-control" name="dateOfBirth" value="<?= ($student['Date_of_birth']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="Address">Address<span class="req-star errortext" style="color: red;">*</span></label>
                    <input type="text" name="Address" value="<?= htmlspecialchars($student['address']) ?>" placeholder="Enter full address" required>
                </div>

                <div class="form-group">
                    <label for="Phnumber">Phone number<span class="req-star errortext" style="color: red;">*</span></label>
                    <input type="tel" name="Phnumber" value="<?= htmlspecialchars($student['phone_number']) ?>" id="digits" placeholder="Enter phone number" maxlength="10" required>
                </div>
                <div class="form-group">
                    <label for="Marks">Marks<span class="req-star errortext" style="color: red;">*</span></label>
                    <input type="number" name="Marks" id="digits" value="<?= htmlspecialchars($student['marks']) ?>" placeholder="Enter your marks" maxlength="3" required>
                </div>
                <div class="form-group">
                    <label for="Email">Email address<span class="req-star errortext" style="color: red;">*</span></label>
                    <input type="email" name="Email" id="mailing" value="<?= htmlspecialchars($student['email_address']) ?>" placeholder="Enter mail address" required>
                </div>
                <div class="submit-btn">
                    <button type="submit" value="update" name="update" class="btn1" id="displayButton"> UPDATE </button>
                    <button type="button" class="btn1"><a href="<?= site_url('StudentController/index'); ?>"> CANCEL </a></button>
                </div>
            </div>
        </form>
        <?php if (!empty($error)): ?>
            <p class="error"><?= $error; ?></p>
        <?php endif; ?>
    </div>
    <div class="toast-container position-fixed top-0 end-0 p-3" id="toast-container">
        <!-- Success Toast -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="3000" style=" position: fixed; top: 80px;right: 20px;z-index: 1050;max-width: 300px; background-color: yellow;">
                <div class="d-flex">
                    <div class="toast-body">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>

        <!-- Error Toast -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="toast align-items-center text-white bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="3000">
                <div class="d-flex">
                    <div class="toast-body">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>