<!DOCTYPE html>
<html lang="en">
<style>
        form{
      border : 3px solid #f1f1f1;  
      
      
		}

       button{
       background-color : #4CAF50;
       color:white;
       padding: 14px 20px;
       margin: 8px 0;
       border: none;
       width:auto;
       
		}

        input[type=password]
        {
      width:100%;
      padding: 12px 20px;
      margin :8px 0;
      display : inline-block;
      border: 1px solid #ccc;
      box-sizing : border-box;
      
		}

       h2{
        text-align:center;
	   } 
     
	.container{
       padding : 16px;
	  }

 </style>
      

  <head>
    <title>Wirmon &mdash; Change password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>
         <h2> Change your password </h2>
  <form>
             <div class="container">
              <label for="old_password"><b>Old Password</b></label>
              <input type="password" name="old_psw"  placeholder="Enter your old password" required="required">
            </div>

            <div class="container">
              <label for="new_password"><b>New Password</b></label>
              <input type="password" name="new_psw"   placeholder="Enter your New password" required="required">
            </div>

            <div class="container">
              <label for="re_enter password"><b>Re-enter Password</b></label>
              <input type="password" name="re-enter_psw"    placeholder="Re-enter your password" required="required">
            </div>
              
              <div class="container">
                   <button type="submit">Submit</button>   

               </div>             

  </form>
  </body>
 </html>