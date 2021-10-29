<?php session_start();
require_once "/home/1900040/public_html/cmp306/coursework/block/two/model/api.php";
require_once "/home/1900040/public_html/cmp306/coursework/block/two/model/productTableRow.php";

?>
<!--<script src="admin/admin-products-options.js"></script>-->
<div class="text-center">

    <div class="new-product my-2" style="text-align: right">
        <button class="btn btn-outline-primary " id="btnNewProduct">Add New Product</button>
    </div>

    <table class="table table-hover table-sm">
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $products = getAllProducts();

        foreach ($products["products"] as $product) {
            $output = "<tr>";
            $output .= "<td>" . $product["name"] . "</td>";

            $price = $product["price"];
            $price = number_format($price,2);

            $output .= "<td>" . $price . "</td>";


            $desc = $product["description"];

            if (count_chars($desc) > 100) {
                $desc = substr($desc, 0, 100);
                $desc = trim($desc);
                $desc .= "...";
            }

            $output .= "<td style='text-align: left'>" . $desc . "</td>";

            $btnView = '<button class="btn btn-primary btn-data-action btn-view">View<span class="id d-none">' . $product["id"] . '</span></button>';
            $btnEdit = '    <button class="btn btn-warning btn-data-action btn-edit">Edit<span class="id d-none">' . $product["id"] . '</span></button>';
            $btnDelete = '<button class="btn btn-danger btn-data-action btn-delete">Delete<span class="id d-none">' . $product["id"] . '</span></button>';

            $buttons = $btnView . $btnEdit . $btnDelete;

            $output .= "<td>" . $buttons . "</td>";

            $output .= "</tr>";

            echo $output;
        }

        ?>
        </tbody>
    </table>
</div>