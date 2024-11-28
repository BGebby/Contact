<?php require_once 'views/layout/header.php'; ?>

<div class="container">
    <h1>Add New Contact</h1>
    
    <form action="index.php?action=create" method="POST" class="max-w-md">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">LastName</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>
        
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

      

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save Contact</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<?php require_once 'views/layout/footer.php'; ?>