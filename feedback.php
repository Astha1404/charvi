<div class="container">
    <h1 class="display-6 text-secondary text-center mb-4"><span class="border-bottom border-5 mb-4" style="border:rgb(230, 198, 157) ;">Feedback</span></h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="my-4">
        <div class="row justify-content-around py-4">
            <textarea class="form-control col-8 w-75" type="text" name="feedback" placeholder="Write Your Feedback" required></textarea>
            <button type="submit" name="submitFeedback" value="<?php echo $_GET['id']; ?>" class="btn btn-primary col-2">Submit</button>
        </div>
        <div class="card-4">
            <div class="d-flex justify-content-between align-items-center"> 
                <fieldset class="rating fs-2">
                    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                    <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                </fieldset>
                <?php
                    $sql = "SELECT * FROM feedback WHERE product_id={$_GET['id']}";
                    $result = mysqli_query($con,$sql);
                    $num = mysqli_num_rows($result);
                ?>
                <h5 class="review-count"><?php echo $num; ?> Reviews</h5>
            </div>
        </div>
    </form>
    <?php
        $sql = "SELECT * FROM feedback WHERE product_id={$_GET['id']}";
        $result = mysqli_query($con,$sql);
        if($result)
        {
            if(mysqli_num_rows($result)>0)
            {
                while($row=mysqli_fetch_assoc($result))
                {
                    $sql = "SELECT * FROM user WHERE user_id={$row['USER_ID']}";
                    $result1 = mysqli_query($con,$sql);
                    $row1 = mysqli_fetch_assoc($result1);
                    $uName = $row1['USER_NAME'];
                    $feedback = $row['FEEDBACK'];
                    $rating = $row['RATING'];
    ?>
                    <div class="container-fluid bg-light rounded-3 py-4 row mx-0">
                        <div class="col-3 d-flex flex-column justify-content-center align-items-center border-end border-secondary">
                            <span><i class="bi bi-person-circle display-1"></i></span>
                            <h4><?php echo $uName; ?></h4>
                        </div>
                        <div class="col-8">
                        <div class="ratings fs-2">
                <?php
                    $i=0;
                    $n = $rating-1;
                    while($i<$n)
                    {
                ?>
                        
                    <!-- <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                    <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label> -->
                    <i class="bi bi-star-fill text-warning"></i>
    <?php 
                        $i = $i+1;
                    }
                    if(($rating*2)%2==1)
                    {
    ?>
                        <i class="bi bi-star-half text-warning"></i>
    <?php
                    }
    ?>
                        </div>
                        <p class="text-muted"><?php echo $feedback; ?></p>
                        </div>
                    </div>
    <?php
                }
            }
            else
            {
    ?>
        <h1 class="text-light bg-secondary text-center py-4">No Reviews Yet</h1>
    <?php
            }
        }
    ?>

</div>