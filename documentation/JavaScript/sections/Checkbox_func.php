<div class="page-header"><h3>CheckBox Functionality</h3><hr class="notop"></div>
<ol>
<li>
<div id="how_checked_unchecked_checkbox">
<h4>How to checked &amp; unchecked all checkbox using JavaScript &amp; JQuery?  </h4>
<br/>
<strong>Download Source File :</strong> <a href="download/how_checked_unchecked_checkbox_ex.rar" >SRC Files</a>
<h6>File Name :script.js </h6>
<pre class="prettyprint linenums">
<code class="language-js">
$(document).ready(function() {
		$('#selectAll').click(function(event) {  //on click
			if(this.checked) { // check select status
				$('.checkboxClass').each(function() { //loop through each checkbox
					this.checked = true;  //select all checkboxes with class "checkbox1"              
				});
			}else{
				$('.checkboxClass').each(function() { //loop through each checkbox
					this.checked = false; //deselect all checkboxes with class "checkbox1"                      
				});        
			}
		});
		
		$(".checkboxClass").click(function () {
			if (!$(this).is(":checked"))
			$("#selectAll").prop("checked", false);
		});
		
	});
	
	function getCheckBoxStatus(){
		var val = [];
		var checkedval="";
		$('input[name=chkbox]').each(function(i)
		{
					val[i] = $(this).val();
					if(this.checked == true)
					{
							checkedval= checkedval  + "," + $(this).val();
					}
		});
		return checkedval;
	}

	function getAllSelected(){
		var checkedval= getCheckBoxStatus();
		if(checkedval!="")
		{ 
			var $arguments ="ids="+checkedval;
			alert($arguments);
			return false;
		}
		else
		{	
			alert("Please select at least 1 record to proceed.");
			return false;
		} 
	
	}
	
</code>	
</pre>
<br/>
<h6>File Name :index.html </h6>
<pre class="prettyprint lang-html linenums" id="how_checked_unchecked_checkbox_ex">
<table style="border:1px solid black;">
			<thead>
			<tr><th><input id="selectAll" type="checkbox"></th>
			<th>First Name</th>
			<th>Last Name</th>
			
		</thead>
		
	    <tbody>		<tr class="odd">
		  				<td class=" "><input name="chkbox" class="checkboxClass" value="39" type="checkbox"></td>
						<td class=" ">Vipul</td>
						<td class=" ">Chauhan </td>
						
		  			</tr><tr class="even">
		  				<td class=" "><input name="chkbox" class="checkboxClass" value="40" type="checkbox"></td>
						<td class=" ">Jalpa</td>
						<td class=" ">Chauhan</td>
						
		  			</tr><tr class="odd">
		  				<td class=" "><input name="chkbox" class="checkboxClass" value="46" type="checkbox"></td>
						<td class=" ">Vishal</td>
						<td class=" ">Parmar</td>
						
		  			</tr><tr class="even">
		  				<td class=" "><input name="chkbox" class="checkboxClass" value="47" type="checkbox"></td>
						<td class=" ">Nayan</td>
						<td class=" ">Mali</td>
						
		  			</tr><tr class="odd">
		  				<td class=" "><input name="chkbox" class="checkboxClass" value="48" type="checkbox"></td>
						<td class=" ">Saumil</td>
						<td class=" ">Shah</td>
						
		  			</tr><tr class="even">
		  				<td class=" "><input name="chkbox" class="checkboxClass" value="49" type="checkbox"></td>
						<td class=" ">Bharat</td>
						<td class=" ">Rohit </td>
						
		  			</tr><tr class="odd">
		  				<td class=" "><input name="chkbox" class="checkboxClass" value="50" type="checkbox"></td>
						<td class=" ">Tushar</td>
						<td class=" ">Jethva </td>
						
		  			</tr><tr class="even">
		  				<td class=" "><input name="chkbox" class="checkboxClass" value="51" type="checkbox"></td>
						<td class=" ">Mihir</td>
						<td class=" ">Panchal</td>
						
		  			</tr><tr class="odd">
		  				<td class=" "><input name="chkbox" class="checkboxClass" value="52" type="checkbox"></td>
						<td class=" ">Tarun</td>
						<td class=" ">Patel</td>
					</tr>
					<tr>
					 <td colspan="3"><button onclick="getAllSelected();">Get All Selected</button></td>
				</tbody>
				
				
</table>
<script src="jquery-1.10.2.js"></script>
<script type="text/javascript" src="script.js"></script>
</pre>
<script>//<![CDATA[
(function () {
  function html(s) {
    return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
  }

  var quineHtml = html($("#how_checked_unchecked_checkbox_ex").html());

  // Highlight the operative parts:
  quineHtml = quineHtml.replace(
    /&lt;script src[\s\S]*?&gt;&lt;\/script&gt;|&lt;!--\?[\s\S]*?--&gt;|&lt;pre\b[\s\S]*?&lt;\/pre&gt;/g,
    '<span class="operative">$&</span>');

  document.getElementById("how_checked_unchecked_checkbox_ex").innerHTML = quineHtml;
})();
//]]>
</script>
</div>
</li>
<li>
<div id="how_get_checkbox_info">
<h4>How to access checkbox info if checkbox name contains form name as prefix ?  </h4>
<br/>
<strong>Download Source File :</strong> <a href="download/how_get_checkbox_info_ex.rar" >SRC Files</a>
<h6>File Name :script.js </h6>
<pre class="prettyprint linenums">
<code class="language-js">
$(document).ready(function() {
		load();
	});
	
	function load(){
		
		var element = document.getElementsByName("batchProcessForm.frequency");
		alert(element[0].id);
		alert(element[0].value);
		alert(element[0].checked);

		alert(element[1].id);
		alert(element[1].value);
		alert(element[1].checked);

		alert(element[2].id);
		alert(element[2].value);
		alert(element[2].checked);
	
	}  
	
</code>	
</pre>
<br/>
<h6>File Name :index.html </h6>
<pre class="prettyprint lang-html linenums" id="how_get_checkbox_info_ex">
<form name="MiscBatchProcessForm" id="MiscBatchProcessForm">
	<input type="checkbox" id="f1" value="1" name="batchProcessForm.frequency"  />
	<input type="checkbox" id="f2" value="2" name="batchProcessForm.frequency"  />
	<input type="checkbox" id="f3" value="3" name="batchProcessForm.frequency"  />
	<input type="button" value="Save"  onclick="load();"/>
</form>
<script type="text/javascript" src="script.js"></script>
</pre>
<script>//<![CDATA[
(function () {
  function html(s) {
    return s.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
  }

  var quineHtml = html($("#how_get_checkbox_info_ex").html());

  // Highlight the operative parts:
  quineHtml = quineHtml.replace(
    /&lt;script src[\s\S]*?&gt;&lt;\/script&gt;|&lt;!--\?[\s\S]*?--&gt;|&lt;pre\b[\s\S]*?&lt;\/pre&gt;/g,
    '<span class="operative">$&</span>');

  document.getElementById("how_get_checkbox_info_ex").innerHTML = quineHtml;
})();
//]]>
</script>
</div>
</li>

</ol>