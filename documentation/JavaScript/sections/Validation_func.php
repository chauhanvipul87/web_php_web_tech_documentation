<div class="page-header"><h3>Validation Functionality</h3><hr class="notop"></div>
<ol>
<li>
<div id="validate_email">
<h4>How to validate an Email using JavaScript?   </h4>
Following code used to validate the email address.<br/>
<strong>Download Source File :</strong> <a href="download/validate_email_ex.rar" >SRC Files</a>
<h6>File Name :script.js </h6>
<pre class="prettyprint linenums">
<code class="language-js">
function IsEmail(email) {
     var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]  {2,4})+$/;
    return regex.test(email);
}
</code>	
</pre>
<strong>Example :</strong><br/>
We can test email address by above function like :
This function return boolean value , it will return either true or false based on the validation test.
If user has supplied wrong email address then it  will return false otherwise return true. 
<pre class="prettyprint linenums">
<code class="language-js">
	IsEmail("chauhanvipul87@gmail.com"); -->    output : true
	IsEmail("chauhan.com")               -->    output : false
</code>	
</pre>
</div>
</li>


</ol>