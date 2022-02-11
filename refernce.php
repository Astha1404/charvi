*{
    margin: 0;
    padding: 0;
    box-sizing:border-box;
    text-decoration: none;
    font-family: poppins;
}

body{
    min-height: 100vh;
    width:100%

}
div.sidebar
{  
    position: fixed;
    height:100%;
    width:100px;
    background-color:steelblue;
    transition: all 0.5s ease;
}

.sidebar .active
{
    width:50px;
}

}
.sidebar ul.nav-links
{
    margin-top: 15px;
}

.sidebar .nav-links li
{
    height: 35px;
    width: 240px;
    list-style: none;
}

.sidebar .nav-links li a
{
   /* background-color:red;*/
    height: 40px;
    width: 100px;
    display:flex;
    align-items: center;
    text-decoration: none;
    /*transition:all 0.4s ease;*/
}
.sidebar .nav-links li a:hover
{
    background-color:mediumblue ;
}

.sidebar .nav-links li a i
{
   /* background-color:yellowgreen;*/
    min-width: 50px;
    text-align: center;
    color: white;
    font-size: 18px;
    margin-right:10px
}

.sidebar .nav-links li a .link_name
{    margin-left: 5px;
    color:white;
    font-size: 16px;
    font-weight: 400;
    white-space: nowrap;

}
/*************/
.home-section
{
    background:whitesmoke ;
    position: relative;
    height:100%;
    min-height: 100vh;
    width:calc(100%-100px);
    left: 100px;
    transition: all 0.5s ease;
}

.sidebar.active ~ .home-section{
    width:calc(100% -100px);
    left:6px;
}

.home-section nav{
    height:80px ;
    background-color:white ;
    padding: 0 20px;
    display: flex;
    align-items:center ;
}

.home-section nav .sidebar-button{
    display: flex;
    align-items: center;
    font-size: 20px;
    font-weight: 500;
}
.home-section nav .sidebar-button i
{
    font-size: 34px;
    margin-right: 10px;
}
