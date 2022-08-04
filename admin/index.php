<?php
include 'partials/header.php';
?>
<section class="dashboard">
    <div class="container dashboard_container">
        <button id="show_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide_sidebar-btn" class="sidebar_toggle"><i class="uil uil-angle-left-b"></i></button>
        <aside>
            <ul>
                <li>
                    <a href="add-post.php"><i class="uil uil-pen"></i>
                        <h5>Add Post</h5>        
                    </a>
                </li>
                <li>
                    <a href="index.php" class="active"><i class="uil uil-postcard"></i>
                        <h5>Manage Post</h5>        
                    </a>
                </li>
                <?php if(isset($_SESSION['user_is_admin'])) : ?>
                <li>
                    
                    <a href="add-user.php"><i class="uil uil-user-plus"></i>
                        <h5>Add User</h5>        
                    </a>
                </li>
                <li>
                    <a href="manage-user.php" ><i class="uil uil-users-alt"></i>
                        <h5>Manager User</h5>        
                    </a>
                </li>
                <li>
                    <a href="add-category.php" ><i class="uil uil-edit"></i>
                        <h5>Add Category</h5>        
                    </a>
                </li>
                <li>
                    <a href="manage-categories.php" ><i class="uil uil-clipboard-notes"></i>
                        <h5>Manage Category</h5>        
                    </a>
                </li>
                <?php endif ?>

            </ul>
        </aside>
        <main>
            <h2>Manage Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>Titel</th>
                        <th>Catrgory</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td>Lorem ipsum dolor sit amet consectetur.</td>
                        <td>Wild Life</td>
                        <td><a href="edit-user.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                    </tr>
                    <tr>
                        <td>Lorem ipsum dolor sit amet.</td>
                        <td>Travel</td>
                        <td><a href="edit-user.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                    </tr> <tr>
                        <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</td>
                        <td>Music</td>
                        <td><a href="edit-user.php" class="btn sm">Edit</a></td>
                        <td><a href="delete-category.php" class="btn sm danger">Delete</a></td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</section>
<?php
include '../partials/footer.php';
?>