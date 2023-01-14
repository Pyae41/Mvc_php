<div class="container">
    <h3>Add Customer</h3>
    <a href="categories" class="btn btn-primary">Back</a>

    <form action="" class="form w-50 mx-auto" method="post">
        <div class="form-group">
            <label class="form-label">
                Name
            </label>
            <input type="text" name="name" value="<?php echo $category["name"]; ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for=''>Parent</label>
            <select name="parent" class="form-control">
                <?php

                if ($category["parent"] == 0) {
                    echo "<option value='0' selected>No parent</option>";
                    foreach ($parents as $parent) {
                        echo "<option value='" . $parent["id"] . "'>" . $parent["name"] . "</option>";
                    }
                } else {
                    foreach ($parents as $parent) {
                        if ($parent["id"] == $category["parent"]) {
                            echo "<option value='" . $parent["id"] . "' selected>" . $parent["name"] . "</option>";
                        } else {
                            echo "<option value='" . $parent["id"] . "'>" . $parent["name"] . "</option>";
                        }
                    }
                }


                ?>
            </select>;
        </div>
        <button type="submit" class="btn btn-success w-100" name="submit">Add</button>
    </form>
</div>