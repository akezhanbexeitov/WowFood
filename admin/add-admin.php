<?php
    include ('partials/menu.php');
?>

<div class='main-content'>
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/>
        <br/>

        <form action="" method='POST'>
            <table class='tbl-30'>
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name='full_name' placeholder='Enter here'>
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name='username' placeholder='Enter here'>
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name='password' placeholder='Enter here'>
                    </td>
                </tr>

                <tr>
                    <td colspan='2'>
                        <input type="submit" name='submit' value='Add Admin' class='btn-secondary'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    include ('partials/footer.php');
?>

<?php
    // Process the value from Form and Save it in Database

    if(isset($_POST['submit'])) {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO tbl_admin SET 
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        // Execute query and save data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        // Check query is executed or not and display appropriate message
        if($res) {
            $_SESSION['add'] = 'Admin added successfully';
            header('Location:'.HOME_URL.'admin/manage-admin.php');
        } else {
            $_SESSION['add'] = 'Failed to add admin';
            header('Location:'.HOME_URL.'admin/add-admin.php');
        }
    } 
?>