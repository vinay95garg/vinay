<style type="text/css">
	

.field{
	padding: 5px;
	position: relative;
	left: 430px;
}

#logform {
  position: relative;
  margin: 80px auto;
  width: 400px;
  padding-right: 32px;
  font-weight: 300;
  color: #a8a7a8;
  text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.8);
}
#logform p {
  margin: 0 0 10px;
}

input, button, label {
  font-size: 15px;
  font-weight: 300;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

input[type=text], input[type=password] {
  padding: 0 12px;
  width: 300px;
  height: 40px;
  color: #bbb;
  text-shadow: 1px 1px 2px black;
  background: rgba(0, 0, 0, 0.16);
  border: 0;
  border-radius: 5px;
  -webkit-box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.06);
  box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.06);
}
input[type=text]:focus, input[type=password]:focus {
  color: white;
  background: rgba(0, 0, 0, 0.1);
  outline: 0;
}

body,  #submit:before, #submit:after {
  background: #373737 url("img/bg.png") 0 0 repeat;
}

body {
  font: 14px/20px 'Helvetica Neue', Helvetica, Arial, sans-serif;
  color: #404040;
}


label {
  float: left;
  width: 100px;
  line-height: 40px;
  padding-right: 10px;
  font-weight: 100;
  text-align: right;
  letter-spacing: 1px;
}

#submit{
  position: absolute;
  top: 82px;
  right: 0;
  width: 48px;
  height: 48px;
  padding: 8px;
  border-radius: 32px;
      background: #503769;
  -webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.35);
  box-shadow: 0 0 4px rgba(0, 0, 0, 0.35);
}

#registerButton,#register_submit 
{ 
	position: relative;
  top: 1px;
  left: 800px;
  right: 0;
  width: 75px;
  height: 38px;
  padding: 8px;
  border-radius: 32px;
  -webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.35);
  box-shadow: 0 0 4px rgba(0, 0, 0, 0.35);
}
#registerButton:before, #registerButton:after {
  content: '';
  z-index: 1;
  position: absolute;
}

#registerButton:before {
  top: 28px;
  left: -4px;
  width: 4px;
  height: 10px;
  -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.06);
  box-shadow: inset 0 1px rgba(255, 255, 255, 0.06);
}
#registerButton:after {
  top: -4px;
  bottom: -4px;
  right: -4px;
  width: 36px;
}

#submit:after {
  top: -4px;
  bottom: -4px;
  right: -4px;
  width: 36px;
}


#submit {
 
  z-index: 2;
  width: 48px;
  height: 48px;
  padding: 0 0 48px;
  text-indent: 120%;
  white-space: nowrap;
  overflow: hidden;
  background: none;
  border: 0;
  border-radius: 24px;
  cursor: pointer;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.2), 0 1px rgba(255, 255, 255, 0.1);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.2), 0 1px rgba(255, 255, 255, 0.1);
 }
#submit:before {
  content: '';
  position: absolute;
  top: 5px;
  bottom: 5px;
  left: 5px;
  right: 5px;
  background: #00a2d3;
  border-radius: 24px;
  background-image: -webkit-linear-gradient(top, #00a2d3, #0d7796);
  background-image: -moz-linear-gradient(top, #00a2d3, #0d7796);
  background-image: -o-linear-gradient(top, #00a2d3, #0d7796);
  background-image: linear-gradient(to bottom, #00a2d3, #0d7796);
  -webkit-box-shadow: inset 0 0 0 1px #00a2d3, 0 0 0 5px rgba(0, 0, 0, 0.16);
  box-shadow: inset 0 0 0 1px #00a2d3, 0 0 0 5px rgba(0, 0, 0, 0.16);
}
#submit:active:before {
  background: #0591ba;
  background-image: -webkit-linear-gradient(top, #0591ba, #00a2d3);
  background-image: -moz-linear-gradient(top, #0591ba, #00a2d3);
  background-image: -o-linear-gradient(top, #0591ba, #00a2d3);
  background-image: linear-gradient(to bottom, #0591ba, #00a2d3);
}
#submit:after {
  content: '';
  position: absolute;
  top: 15px;
  left: 12px;
  width: 25px;
  height: 19px;
  background: url("img/arrow.png") 0 0 no-repeat;
}


::-moz-focus-inner {
  border: 0;
  padding: 0;
}

.lt-ie9 input[type=text], .lt-ie9 input[type=password] {
  line-height: 40px;
  background: #282828;
}
.lt-ie9 #submit {
  position: absolute;
  top: 12px;
  right: -28px;
  padding: 4px;
}
.lt-ie9 #submit:before, .lt-ie9 #submit:after {
  display: none;
}


</style>








     <div type="text"  id="log">
         <div type="text"  id="logform">
		        <label for ="username">username</label>
				<input type="text"    name="login"  placeholder="abcd@xyz.com" id="username"/>
				<br/>
				<label for="password">password</label>
				<input type="password" name="password" id="password"  placeholder="12345"/>
				<br/>
				<button type="submit" id="submit"  value=""></button>
				<br/>
				</div>
				
				<input type="submit" id="logout_submit" value="logout" style="display:none">
				

				<input type="submit" id="registerButton" value="register">
				
				<div id="infoSQL"></div>
				</div>
				
				
				
				<div type="text" id="form_container" method="post" style="display:none">
				<div class="field">
				  
				  <input type="text" name="regusername" id="regusername"  value="" placeholder="Username">
				  </div>
				  
				  
				  <div class="field">
				  
				  <input type="password" name="regpassword" id="regpassword"  value="" placeholder="Password">
				  </div>
				  
				  
				  <div class="field">
				 
				  <input type="password" name="regpassword_again" id="regpassword_again"  value=""placeholder="Re-Password">
				  </div>
				  
				  
				  <input type="submit" id="register_submit" value="submit"> 
				  </div>
				  
				