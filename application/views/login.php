<?php require('header.php'); ?>

<body>


    <div class="container d-flex justify-content-center ">
        <div class="login-page ">
            <div class="form">
                <form class="register-form">
                 
                            <div class="form-group ">
                                <label for="exampleInputEmail1">your first name</label>
                                <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Enter ur name">

                            </div>
                            <div class="form-group ">
                                <label for="exampleInputEmail1">your last name</label>
                                <input type="text" class="form-control" id="lastname" aria-describedby="emailHelp" placeholder="Enter ur name">

                            </div>
                        
                      
                            <div class="form-group ">
                                <label for="alias">your surname</label>
                                <input type="text" class="form-control" id="alias" aria-describedby="emailHelp" placeholder="Enter ur name">

                            </div>
                            <div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">your login</label>
                            <input type="text" class="form-control" id="login_register" aria-describedby="emailHelp" placeholder="Enter ur name">

                        </div>
                        <div class="form-group">
                            <label for="choice">your favorite choice </label>
                            <select class="custom-select" id="selectviennoiserie">
                                <option value="2">t1</option>
                                <option value="3">t2</option>
                                <option value="4">t3</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label >ur Password</label>
                            <input type="password" class="form-control" id="pssd1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label > Again ur Password</label>
                            <input type="password" class="form-control" id="pssd2" placeholder="Password">
                        </div>
                        <div class=" d-flex flex-column justify-content-center">
                            <button  id="btnsubcreatecount">Creat a count</button>

                        </div>

                   
                    <p class="message">Already registered? <a href="#">Sign In</a></p>
                </form>
                <form class="login-form">
                    <input type="text" id="login" placeholder="username" />
                    <input type="password" id="pwd" placeholder="password" />
                    <button type="button" id="btnsub">login</button>
                    <p class="message">Not registered? <a href="#">Create an account</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="./application/assets/js/scripts_login.js"></script>
<script>

</html>