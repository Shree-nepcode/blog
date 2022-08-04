<?php
include 'partials/header.php';
?>
      
<section class="form_section" enctype="multipart/form-data">
    <div class="container form_section-container">
        <h2>Edit User</h2>
        
        <form action="" enctype="multipart/form-data">
            <input type="text" placeholder="Firstn Name">
            <input type="text" placeholder="Last Name">
          
            <select>
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
           
            <button type="submit" class="btn">Add User Up</button>
        </form>
    </div>
</section>
<?php
include '../partials/footer.php';
?>