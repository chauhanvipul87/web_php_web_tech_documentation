<div class="page-header"><h3>Ajax Request Functionality</h3><hr class="notop"></div>
<ol>
<li>
<div id="generic_ajax_request_code">
<h4>How to send GET AJAX request using Generic Code?  </h4>
<br/>
<strong>Download Source File :</strong> <a href="download/generic_ajax_request_code_ex.rar" >SRC Files</a>
<h6>File Name :request.js </h6>
<pre class="prettyprint linenums">
<code class="language-js">
//This is the generic code used to send GET request. 
function sendRequest($ajaxUrl,$arguments,$timeStamp,$ajaxResponseLayer){
	
	var $currentTime = new Date();
	var $timeStamp = $currentTime.getHours() + $currentTime.getMinutes()
	+ $currentTime.getSeconds() + $currentTime.getMilliseconds()
	+ $currentTime.getDay() + $currentTime.getMonth()
	+ $currentTime.getFullYear() + Math.random();
	
	 $.ajax({
		url : $ajaxUrl + "?" + $arguments + "&stamp=" + $timeStamp,
		cache : false,
		beforeSend : function() {
			/* call method before send request to server  */
			showProgressBar();
		},
		complete : function($response, $status) {
			/* hide progress bar once we get response */
			hideProgressBar();
			if ($status != "error" && $status != "timeout") {
				/* for set response in div */
				if($ajaxResponseLayer !="")  
			    {	
					if($response.responseText.search("showMessage")>-1){
						//alert('in if ::');
						$("#errorDiv").html($response.responseText.trim());
						processAfterResponse($ajaxUrl,$arguments,$timeStamp,$ajaxResponseLayer,$response.responseText);
						return false;
					}
					if($ajaxUrl == 'puturl.html'){
							//code here
					}
					$("#"+$ajaxResponseLayer).html($response.responseText);
					processAfterResponse($ajaxUrl,$arguments,$timeStamp,$ajaxResponseLayer,$response.responseText);
				}
				
			}
		},
		error : function($obj) {
			/* call when error occurs */
			hideProgressBar();
			alert("Something went wrong while processing your request."+$obj.responseText);
		}
	});  
}

// Peform any operation after response completed.
function processAfterResponse($ajaxUrl,$arguments,$timeStamp,$ajaxResponseLayer,$response){
	
	if($ajaxUrl =='markApproved.html'){
		if($response.search("success")>-1){
			//
		}
	}
}

//show progress bar when request is in process.
function showProgressBar() {
		document.getElementById('ajax_loader').style.display = 'block';
}

//Hide progress bar when request is completed or finished.
function hideProgressBar() {
	 document.getElementById('ajax_loader').style.display = 'none';
}	
	
</code>	
</pre>
</div>
</li>
</ol>