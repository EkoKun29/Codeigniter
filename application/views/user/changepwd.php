<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            
          <h4 class="card-title">Ganti Password</h4>
          <form class="forms-sample" action="<?= base_url('changepassword/update');?>" method="post">
            

            <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-6">
                        <input name="username" type="text" placeholder="Masukan Username" class="form-control" value="<?= $username?>" disabled />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-6">
                        <input name="pwd_lama" type="password" placeholder="Masukan Password Lama" class="form-control" value="" required/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-6"> <span class="badge badge-success">harap masukan password dengan kombinasi huruf dan angka</span><br>
                        <input name="pwd_baru" type="password" placeholder="Masukan Password Baru" class="form-control" value=""   onkeyup="validatePassword(this.value);" required/>
                        
                        <br>
                    <span id="msg"></span>
                    
                    </div>

                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ulangi Password Baru</label>
                    <div class="col-sm-6">
                        <input name="pwd_baru_2" type="password" placeholder="Ulangi Masukan Password Baru" class="form-control" value="" required/>
                    </div>
                </div>
                <input name="userid" type="hidden"  value="<?= $userid; ?>"/>   
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-6">
                        <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                    </div>
                </div>     
          </form>
        </div>
      </div>
    </div>
 </div>   

 <script>
$(function(){
            
        $('form').ajaxForm({
            dataType: 'json',
            beforeSubmit: function(arr, $form, options) { 
                $('#modal-loading').modal('show');
            },        
            success: function(data){
                $('#modal-loading').modal('hide');
                if(data.success) {
                    $.gritter.add({
                        title: 'Success!',
                        text: data.msg,
                        class_name: 'gritter-success gritter-center'
                    });
                    setTimeout(function(){ 
                        location.href = '<?= base_url('home/dashboard')?>';
                     }, 1000);
                    
                } else{
                    $.gritter.add({
                        title: 'Error!',
                        text: data.msg,
                        class_name: 'gritter-error gritter-center'
                    });
                }
            }
        });        
    }); 
    function validatePassword(password) {
                
                // Do not show anything when the length of password is zero.
                if (password.length === 0) {
                    document.getElementById("msg").innerHTML = "";
                    return;
                }
                // Create an array and push all possible values that you want in password
                var matchedCase = new Array();
                matchedCase.push("[$@$!%*#?&]"); // Special Charector
                matchedCase.push("[A-Z]");      // Uppercase Alpabates
                matchedCase.push("[0-9]");      // Numbers
                matchedCase.push("[a-z]");     // Lowercase Alphabates

                // Check the conditions
                var ctr = 0;
                for (var i = 0; i < matchedCase.length; i++) {
                    if (new RegExp(matchedCase[i]).test(password)) {
                        ctr++;
                    }
                }
                // Display it
                var color = "";
                var strength = "";
                switch (ctr) {
                    case 0:
                    case 1:
                        strength = "<span class='badge badge-danger'><strong>PASSWORD LEMAH</strong></span>";
                        color = "red";
                        break;
                    case 2:
                        strength = "<span class='badge badge-warning'><strong>PASSWORD CUKUP</strong></span>";
                        color = "orange";
                        break;
                    case 3:
                        strength = "<span class='badge badge-warning'><strong>PASSWORD KUAT</strong></span>";
                        color = "orange";
                        break;
                    case 4:
                        strength = "<span class='badge badge-success'><strong>PASSWORD SANGAT KUAT</strong></span>";
                        color = "green";
                        break;
                }
                document.getElementById("msg").innerHTML = strength;
                document.getElementById("msg").style.color = color;
            }    
 </script>