<div class="container">
    <h1 class="display-6 text-secondary text-center mb-4"><span class="border-bottom border-5 mb-4" style="border:rgb(230, 198, 157) ;">Feedback</span></h1>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="row justify-content-around py-4">
            <input class="form-control col-8 w-75" type="text" name="feedback" placeholder="Enter Your Feedback">
            <button type="submit" name="submitFeedback" value="submitFeedback" class="btn btn-primary col-2">Submit</button>
        </div>
    </form>
    <div class="container-fluid bg-light rounded-3 py-4 row mx-0">
        <div class="col-3 d-flex flex-column justify-content-center align-items-center border-end border-secondary">
            <span><i class="bi bi-person-circle display-1"></i></span>
            <h4>Harshil Khamar</h4>
        </div>
        <div class="col-8">
            <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto culpa quibusdam fuga aut dolorum nulla praesentium dolor perspiciatis dolorem in magnam corrupti ex totam tempore fugit, est mollitia minima doloribus molestiae architecto fugiat eaque. Commodi vel laudantium facere debitis unde sapiente officiis enim libero quisquam, consequatur magnam eveniet qui corrupti?</p>
        </div>
    </div>

</div>