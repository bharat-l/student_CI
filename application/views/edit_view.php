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
        <a href="<?= base_url('StudentController/dashboard'); ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="<?= base_url('StudentController/profiles'); ?>"><i class="fas fa-user-graduate"></i> Student Information</a>
        <a href="<?= base_url('StudentController/results'); ?>"><i class="fas fa-file-alt"></i> Results</a>
        <a href="<?= base_url('StudentController/library'); ?>"><i class="fas fa-book"></i> Library</a>
        <a href="<?= base_url('StudentController/attendance'); ?>"><i class="fas fa-calendar-check"></i> Attendance</a>
    </div>
    <div class="container">
        <form action="<?= site_url('student/update'); ?>" method="POST" id="textForm" name="formList" autocomplete="off">
            <input type="hidden" name="id" value="<?= htmlspecialchars($student['id']) ?>">
            <h2>STUDENT EDIT FORM</h2>
            <div class="form-container">
                <div class="form-group">
                    <label for="studentName">Student name</label>
                    <input type="text" id="textfields" name="StudentName" value="<?= htmlspecialchars($student['student_name']) ?>" maxlength="30" pattern="[A-Za-z\s]+" placeholder="Enter full name" required>
                </div>
                <div class="form-group">
                    <label for="fatherName">Father name</label>
                    <input type="text" id="textfields" name="FatherName" value="<?= htmlspecialchars($student['Father_name']) ?>" maxlength="30" pattern="[A-Za-z\s]+" placeholder="Enter father name" required>
                </div>
                <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text" name="Address" value="<?= htmlspecialchars($student['address']) ?>" placeholder="Enter full address" required>
                </div>
                <div class="form-group">
                    <label for="Phnumber">Phone number</label>
                    <input type="tel" name="Phnumber" value="<?= htmlspecialchars($student['phone_number']) ?>" id="digits" placeholder="Enter phone number" maxlength="10" required>
                </div>
                <div class="form-group">
                    <label for="Marks">Marks</label>
                    <input type="number" name="Marks" id="digits" value="<?= htmlspecialchars($student['marks']) ?>" placeholder="Enter your marks" maxlength="3" required>
                </div>
                <div class="form-group">
                    <label for="Email">Email address</label>
                    <input type="email" name="Email" id="mailing" value="<?= htmlspecialchars($student['email_address']) ?>" placeholder="Enter mail address" required>
                </div>
                <div class="submit-btn">
                    <button type="submit" value="update" name="update" class="btn1" id="displayButton"><a href="<?= site_url('StudentController/index'); ?>"> UPDATE </a></button>
                    <button type="button" class="btn1"><a href="<?= site_url('StudentController/index'); ?>"> CANCEL </a></button>
                </div>
            </div>
        </form>
        <?php if (!empty($error)): ?>
            <p class="error"><?= $error; ?></p>
        <?php endif; ?>
    </div>
</body>

</html>