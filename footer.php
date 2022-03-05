<footer>
    <div class="container-fluid d-flex flex-wrap footer">
        <div class="col-md-3 col-lg-3 col-sm-12 text-center text-md-start">
            <img src="Assets/Images/FooterLogo.jpg" alt="" class="img-fluid h-25>
            <p class="text-center"></p>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-4 col-12 py-2 d-flex flex-column footer-links text-md-start">
            <h4 class="text-secondary py-2 text-center">Useful Links</h4>
            <?php
                  $sql = "SELECT * FROM category";
                  $result = mysqli_query($con,$sql);
                  if(mysqli_num_rows($result)>0)
                  {
                      while(($row = mysqli_fetch_assoc($result))!=null)
                      {
                          echo "<a class='text-center' href={$category_page}?cid={$row['CATEGORY_ID']}>{$row['CATEGORY_NAME']}</a>";
                      }
                  }
                ?>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-4 col-12 py-2 text-center footer-links text-md-start text-sm-center">
            <div>
                <h4 class="text-secondary text-center py-2">Contact Us</h4>
                <h6 class="text-center">Mobile : +91 1234567890</h6>
                <h6 class="text-center">E-mail : <a href="mailto:abc@xyz.com">abc@xyz.com</a></h6>
                <h4 class="text-secondary text-center py-2 d-block">Social Media</h4>
                <div class="text-center">
                <a href="https://wa.me/91123456789"><i class="bi bi-whatsapp text-success fs-1 m-2"></i></a>
                <a href="https://wa.me/91123456789"><i class="bi bi-facebook text-primary fs-1 m-2"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-4 col-12 py-2 text-center text-md-start">
            <h4 class="text-secondary py-2 text-center">Address</h4>
            <P class="text-center">Samved industrie plot-1,opp.lubby company vadsar-khatraj road kalol,Gandhinagar-382721
</P>
        </div>
    </div>
    <div class="container-fluid footer">
        <h6 class="text-center py-2 my-0">@Copyright Charvi Gruh Udhyog</h6>
    </div>
</footer>