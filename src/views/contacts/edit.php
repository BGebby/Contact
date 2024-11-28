<?php require_once 'views/layout/header.php'; ?>

<div class="container">
    <h1>Edit Contact</h1>
    
    <form action="index.php?action=edit" method="POST" class="max-w-md">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($contact->id); ?>">
        
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" 
                   value="<?php echo htmlspecialchars($contact->first_name); ?>" required>
        </div>
        
        <div class="mb-3">
            <label for="lastname" class="form-label">Last name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" 
                    value="<?php echo htmlspecialchars($contact->last_name); ?>" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input class="form-control" id="phone" name="phone" 
                    value="<?php echo htmlspecialchars($contact->phone); ?>" required>
                      
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" 
                   value="<?php echo htmlspecialchars($contact->email); ?>" required>
        </div>

       

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update Contact</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<?php require_once 'views/layout/footer.php'; ?>