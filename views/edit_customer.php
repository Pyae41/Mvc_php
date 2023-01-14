<div class="container">
    <h3>Add Customer</h3>
    <a href="customers" class="btn btn-primary">Back</a>

    <form action="update_customer?id=<?php echo $_GET["id"]; ?>" class="form w-50 mx-auto" method="post">
        
        <div class="form-group">
            <for class="form-label">
                Name
            </for>
            <input type="text" name="name" id="" class="form-control" value="<?php echo $customer["name"] ?>">
        </div>
        <div class="form-group">
            <for class="form-label">
                Email
            </for>
            <input type="email" name="email" id="" class="form-control" value="<?php echo $customer["email"] ?>">
        </div>
        <div class="form-group">
            <for class="form-label">
                Phone
            </for>
            <input type="text" name="phone" id="" class="form-control" value="<?php echo $customer["phone"] ?>">
        </div>
        <div class="form-group">
            <for class="form-label">
                Address
            </for>
            <input type="text" name="address" id="" class="form-control" value="<?php echo $customer["address"] ?>">
        </div>
        <button type="submit" class="btn btn-success w-100" name="submit">Update</button>
    </form>
</div>