

<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post" enctype="multipart/form-data">
    <div>
        <label for="productName">Enter Product Name : </label>
        <input type="text" name="productName" id="productName">
    </div>
    <div>
        <label for="price">Enter Price : </label>
        <input type="number" name="price" id="price">
    </div>
    <div>
        <label for="description">Enter description : </label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </div>
    <div>
        <label for="quantity">Enter quantity : </label>
        <input type="number" name="quantity" id="quantity">
    </div>
    <div>
        <label for="category">Choose Category : </label>
        <select name="category" id="category">
            <option value="0">Select Category</option>
            <?php
                require 'dbconnection.php';
                $sql = "SELECT * FROM category";
                $result = mysqli_query($con,$sql);
                if(mysqli_num_rows($result)>0)
                {
                    while(($row = mysqli_fetch_assoc($result))!=null)
                    {
                        echo "<option value={$row['CATEGORY_ID']}>{$row['CATEGORY_NAME']}</option>";
                        // die(print_r($row));
                    }
                }
            ?>
        </select>
    </div>
    <div>
        <label for="company">Choose Company : </label>
        <select name="company" id="company">
            <option value="0">Select Category</option>
            <?php
                $sql = "SELECT * FROM company";
                $result = mysqli_query($con,$sql);
                if(mysqli_num_rows($result)>0)
                {
                    while(($row = mysqli_fetch_assoc($result))!=null)
                    {
                        echo "<option value={$row['COMPANY_ID']}>{$row['COMPANY_NAME']}</option>";
                        // die(print_r($row));
                    }
                }
            ?>
        </select>
    </div>
    <div>
            <label for="image">Choose Image : </label>
            <input type="file" name="image" id="image">
        </div>
        <input type="submit" name="submit">

    <?php
        if(isset($_POST['submit']))
        {
            $pname = mysqli_real_escape_string($con,$_POST['productName']);
            $price = mysqli_real_escape_string($con,$_POST['price']);
            $desc = mysqli_real_escape_string($con,$_POST['description']);
            $qty = mysqli_real_escape_string($con,$_POST['quantity']);
            $category = mysqli_real_escape_string($con,$_POST['category']);
            $img = mysqli_real_escape_string($con,$_FILES['image']['name']);
            $company = mysqli_real_escape_string($con,$_POST['company']);
            $tmp_img = mysqli_real_escape_string($con,$_FILES['image']['tmp_name']);
            $sql = "INSERT INTO `product`(`PRODUCT_ID`, `PRODUCT_NAME`, `PRICE`, `DESCRIPTION`, `QUANTITY`, `CATEGORY_ID`, `COMPANY_ID`, `IMAGE`) VALUES (NULL,'{$pname}','{$price}','{$desc}','{$qty}','{$category}','{$company}','{$img}')";
            $result = mysqli_query($con,$sql);
            if($result)
            {
                move_uploaded_file($tmp_img,"Assets/Images/Products/{$img}");
            }
            else
            {
                echo "QUERY FAILED";
            }
        }
    ?>
</form>