
<?php require('header.php');?>
<body>

    <div class="container d-flex justify-content-center ">
        <div class="card align-self-center" style="width: 28rem;">
            <div class="card-body">
                <form id="signinform">





                    <div class="form-row">
                        <div class="form-group col">
                            <label for="exampleInputEmail1">your first name</label>
                            <input type="text" class="form-control" id="firstname" aria-describedby="emailHelp"
                                placeholder="Enter ur name">

                        </div>
                        <div class="form-group col">
                            <label for="exampleInputEmail1">your last name</label>
                            <input type="text" class="form-control" id="lastname" aria-describedby="emailHelp"
                                placeholder="Enter ur name">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="alias">your surname</label>
                            <input type="text" class="form-control" id="alias" aria-describedby="emailHelp"
                                placeholder="Enter ur name">

                        </div>
                        <div></div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">your login</label>
                        <input type="text" class="form-control" id="login_register" aria-describedby="emailHelp"
                            placeholder="Enter ur name">

                    </div>
                    <div class="form-group">
                        <label for="choice">your favorite choice of pastry </label>
                        <select class="custom-select" id="selectviennoiserie">
                            <option value="2">t1</option>
                            <option value="3">t2</option>
                            <option value="4">t3</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">ur Password</label>
                        <input type="password" class="form-control" id="pssd" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Again ur Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class=" d-flex flex-column justify-content-center">
                        <button type="button" class="btn btn-primary" id="btnsubcreatecount">créer un compte</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="./application/assets/js/scripts_login.js"></script>

</html>
