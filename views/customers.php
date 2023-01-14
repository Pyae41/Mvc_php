<h3>Customers</h3>


<a href="create_customer" class="btn btn-success">Add new customer</a>
<div class="row">
    <table class="table border table-striped text-center mt-3">
        <thead class="bg-dark text-white">
            <th>Id</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Email</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            $count = 1;
            foreach ($customers as $customer) {
                echo "<tr>
                            <td>" . $count++ . "</td>
                            <td>" . $customer['name'] . "</td>
                            <td>" . $customer['phone'] . "</td>
                            <td>" . $customer['address'] . "</td>
                            <td>" . $customer['email'] . "</td>
                            <td>
                                <a href='edit_customer?id=" . $customer["id"] . "' class='btn btn-success'>Edit</a>
                                <a href='delete_customer?id=" . $customer["id"] . "' class='btn btn-danger'>Delete</a>
                            </td>
                        </tr>";
            }
            ?>
        </tbody>
    </table>