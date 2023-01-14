<h3>Categories</h3>

<a href="create_category" class="btn btn-success mb-3">Add new category</a>
<div class="row">
    <table class="table border table-striped text-center">
        <thead class="bg-dark text-white">
            <th>Id</th>
            <th>Name</th>
            <th>Subcategories</th>
            <th>Function</th>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($categories as $parent) {
                echo "<tr>";
                echo "<td>" . $count++ . "</td>";
                echo "<td>" . $parent["name"] . "</td>";
                echo "<td>";
                if ($parent["parent"] == 0) {
                    echo "-";
                } else {
                    foreach ($parents as $sub) {
                        if ($sub["id"] == $parent["parent"]) {
                            echo $sub["name"];
                        }
                    }
                }
                echo "</td>";
                echo "<td>
                            <a href='edit_category?id=" . $parent["id"] . "' class='btn btn-success'>Edit</a>
                            <a href='delete_category?id=" . $parent["id"] . "' class='btn btn-danger'>Delete</a>
                        </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>