<div class="container">
    <h3>Add Customer</h3>
    <a href="categories" class="btn btn-primary">Back</a>

    <form action="save_category" class="form w-50 mx-auto" method="post">
        <div class="form-group">
            <label class="form-label">
                Name
            </label>
            <input type="text" name="name" id="" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Parent</label>
            <select name="parent" id="" class="form-control">
                <option value="0" selected>No parent</option>
                <?php
                foreach ($parents as $parent) {
                    echo "<option value='" . $parent["id"] . "'>" . $parent["name"] . "</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success w-100" name="submit">Add</button>
    </form>
</div>