<?php
    include('partials/menu.php');
?>    

    <div class='main-content'>
        <div class='wrapper'>
            <h1>Manage Admin</h1>
            <br/>

            <a href="add-admin.php"><button class='btn-primary'>Add Admin</button></a>
            <br/>
            <br/>

            <?php 
                if(isset($_SESSION['add'])) {
                    echo $_SESSION['add']; // Displaying sessions message
                    unset($_SESSION['add']); // Removing session message
                }
            ?>

            <table class='tbl-full'>
                <tr>
                    <th>S.H.</th>
                    <th>Full Name</th>
                    <th>Username </th>
                    <th>Actions</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM tbl_admin";
                    $res = mysqli_query($conn, $sql);
                    if($res) {
                        $count = mysqli_num_rows($res);
                        $sn = 1;
                        if($count > 0) {
                            while($rows = mysqli_fetch_assoc($res)) {
                                $if = $rows['id'];
                                $full_name = $rows['full_name'];
                                $username = $rows['username'];  
                                ?>
    
                                <tr>
                                    <td><?php echo $sn++ ; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <button class='btn-secondary'>Update Admin</button>
                                        <button class='btn-danger'>Delete Admin</button>
                                    </td>
                                </tr>

                                <?php
                            }
                        } else {

                        }
                    }
                ?>

            </table>
        </div>
    </div>


<?php 
    include('partials/footer.php');
?>