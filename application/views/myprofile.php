
<?php require('header.php');?>
<div class=" d-flex">



    <div class="container d-flex justify-content-center " style="width: 28rem;">
        <div class="card align-self-center" >
            <div class="card-body">
                <div id="msg"></div>
                <form>
                    <input type="hidden" value="" id="id">
                    <div class="form-row">
                            <div class="form-group col">
                                <label for="exampleInputEmail1"id="fname">your first name</label>
                            </div>
                            <div class="form-group col">
                                <label for="exampleInputEmail1" id="lname">your last name</label>
                            </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="exampleInputEmail1">your surname</label>
                        <input type="text" class="form-control" id="surename" aria-describedby="emailHelp"
                            placeholder="Enter ur name">

                    </div>

                </div>
            
                    <div class="form-group">
                        <label for="choice">your favorite choice </label>
                        <select class="custom-select" id="favorit">

                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">ur Password</label>
                        <input type="text" class="form-control" id="mdp" placeholder="Password">
                    </div>

                 <div class=" d-flex flex-column justify-content-center">
                    <button type="button" id="btnSavemyprofil" class="btn btn-primary">Save modification</button>

                </div>

                </form>
            </div>
        </div>
    </div>
    <div class="container  float-right " style="width: 28rem;">

    <canvas id="myCharprofile" width="400" height="500">
    <p>Hello Fallback World</p>
</canvas>



</div>
</div>
</body>
<script src="./application/assets/js/scripts_myprofile.js"></script>
<script></script>
</html>
