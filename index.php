
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>user register & login page</title>
            <link rel="stylesheet" href="style.css">
            </head>
<body>
    <header>
        <h2>charvi</h2>
        <nav>
            <a href="#">HOME<a>
            <a href="#">BLOG<a>
            <a href="#">CONTACT<a>
            <a href="#">ABOUT US<a>
</nav>  
<div class="register">
    <button type="button" onclick="popup('login-popup')">LOGIN</button>
    <button type="button" onclick="popup('register-popup')">REGISTER</button>
</div>
    <div class="popup-container" id="login-popup">
        <div class="popup">
            <form mathod="POST" action="login_register.php">
                <h2>
                    <span>USER LOGIN</span>
                    <button type="reset" onclick="popup('login-popup')">X</button>
                </h2>
                <!--login using only username--->
<input type="text" placeholder="Username"name="username">
<input type="password" placeholder="Password" name="password">
<button type="submit" class="login-btn" name="login">LOGIN</button>
            </form>
        </div>
</div> 


<div class="popup-container" id="register-popup">
        <div class="register popup">
            <form action="" method="POST">
                <h2>
                    <span>USER REGISTER</span>
                    <button type="reset"onclick="popup('register-popup')">X</button>
                </h2>
<!--<input type="text" placeholder="Full Name" name="full name">-->
<input type="text" placeholder="UserName" name="USERNAME">
<input type="password" placeholder="Password"name="PASSWORD">
<input type="text" placeholder="Address"name="ADDRESS">
<input type="email" placeholder="E-mail"name="EMAIL">
<input type="text" placeholder="contect"name="CONTACT_NO">


<button type="submit" class="register-btn"name="register">REGISTER</button>
            </form>
        </div>
</div> 

<script>
function popup(popup_name)
{
get_popup=document.getElementById(popup_name);
if(get_popup.style.display=="flex")
{
    get_popup.style.display="none";
}
else
{
    get_popup.style.display="flex";  
}
}    
</script>

</body>        
</html>