<!doctype html>  
<!--[if IE 6 ]><html lang="en-us" class="ie6"> <![endif]-->
<!--[if IE 7 ]><html lang="en-us" class="ie7"> <![endif]-->
<!--[if IE 8 ]><html lang="en-us" class="ie8"> <![endif]-->
<!--[if (gt IE 7)|!(IE)]><!-->
<html lang="en-us"><!--<![endif]-->
<head>
	<?php include("header.php") ?>
</head>
<body class="documenter-project-documenter-v20">
	<div id="documenter_sidebar">
		<?php include("sidebar.php") ?>
	</div>
	<div id="documenter_content">
	<section id="documenter_cover">
		<?php include("sections/OJCPGuide.php") ?>
	</section>
	<section id="java_basics">
		<?php include("sections/javabasics.php") ?>
	</section>
	
	<section id="features">
		<div class="page-header"><h3>Features</h3><hr class="notop"></div>
	<ul>	<li>		Custom Colors</li>
		<li>		Custom CSS</li>
		<li>		Cufon Font Support</li>
		<li>		zip File Creation</li>
		<li>		Syntaxhighlighter</li>
		<li>		JSON Import/Export</li>
		<li>		Themes</li>
	</ul>
	</section>
<section id="how_much_does_it_cost">
	<div class="page-header"><h3>How much does it cost?</h3><hr class="notop"></div>
<p>	Nothing!</p>
<p>	Yeah that&#39;s right! I offer this service for free!</p>
<p>	If you have to much money you can <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&amp;business=paypal%40revaxarts%2ecom&amp;lc=US&amp;item_name=The%20Documenter%20by%20revaxarts&amp;no_note=0&amp;currency_code=USD&amp;bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHostedGuest">donate</a> for sure<img alt="wink" height="20" src="assets/images/image_15.gif"></p>
</section>
<section id="how_does_it_work">
	<div class="page-header"><h3>How does it work?</h3><hr class="notop"></div>
<p>	It&#39;s really simple.</p>
<p>	<img alt="" src="assets/images/image_10.jpg" style="width: 690px; height: 62px"></p>
<ul>	<li>		The whole documentation is divided into sections.</li>
	<li>		Each section has a title(for this section it&#39;s &quot;How does it work?&quot;) and an ID (which is &quot;#how_does_it_work&quot;)</li>
	<li>		You can make as many sections as you like with the &quot;add Section&quot; Button. You must provide an unique title for each section.</li>
	<li>		You can rearrange sections by drag &#39;n drop the buttons on the right.</li>
	<li>		After you setup your documentation you can download a zip file which contains an &quot;index.html&quot; some JavaScript files and all images which you included.</li>
	<li>		Your generated documentation will stay for about an hour so please be sure to download it (or generate it again)</li>
</ul>
<p>	&nbsp;</p>
</section>
<section id="how_can_i_save_my_docs">
	<div class="page-header"><h3>How can I save my docs?</h3><hr class="notop"></div>
<p>	There are two ways to save your work:</p>
<ul>	<li>		locally on your harddrive (<a href="#json_import_export">JSON Import/Export</a>)</li>
	<li>		<strike>With the third-party-service pasteBin (beta)</strike></li>
	<li>		Save it on your server with the <a href="#advanced_options">Advance Options</a></li>
</ul>
</section>
<section id="html_structure">
	<div class="page-header"><h3>HTML Structure</h3><hr class="notop"></div>
<p>	Here is the HTML Structure of the Documentation (simplified):</p>
<pre class="prettyprint lang-html linenums">
test
</pre>
<pre class="prettyprint linenums">
<code class="language-java">
 public class MainTest{
	private String userName;
 }
</code>
</pre>
<h4 id="html_structure_submenus">Submenus</h4>
<p>	You can use submenus within the navigation.</p>
<p>	Activeate the checkbox and use H4 headlines as the name</p>
<p>	<img alt="" src="assets/images/image_7.png" style="width: 248px; height: 80px"></p>
<p>	The H4 will get an id:</p>
<pre class="prettyprint lang-html linenums">
&lt;h4 id=&quot;section_name_subcategory_name&quot;&gt;Subcategory Name&lt;/h4&gt;
</pre>
<p>	&nbsp;</p>
<p>	&nbsp;</p>
</section>
<section id="customisation">
	<div class="page-header"><h3>Customisation</h3><hr class="notop"></div>
<p>	The Documenter offers a smart way to brand your Documentation</p>
<h4 id="customisation_logo">Logo</h4>
<p>	<img alt="" src="assets/images/image_4.png"></p>
<p>	Include a URL to your Logo. I recommend png with transparent background and smaller then 200x200 pixels.</p>
<h4 id="customisation_custom_css">Custom CSS</h4>
<p>	<img alt="" src="assets/images/image_3.png"></p>
<p>	If you would like to include a custom CSS to change the appearance of your documentation enter a URL to your CSS file. Check out the <a href="#html_structure">HTML Structure</a> and the <a href="#custom_classes">Custom Classes</a> as well!</p>
<h4 id="customisation_colors">Colors</h4>
<p>	<img alt="" src="assets/images/image_9.jpg" style="width: 484px; height: 367px"></p>
<p>	With the color options you can style your documentation so it fits your visual needs.<br>
	Start with a Theme or define each color separately. You can specify a background image too.</p>
<p>	The box on the right gives you a minimalistic preview</p>
<h4 id="customisation_scrolling">Scrolling</h4>
<p>	<img alt="" src="assets/images/image_13.jpg" style="width: 439px; height: 128px"></p>
<p>	Define a custom scrolling function. The duration defines how long the scrolling will happen.</p>
<p class="warning">
	I recommend not to abuse this part. Buyers maybe get confused with some bouncing pages</p>
<h4 id="customisation_cufon_font">Cufon Font</h4>
<p>	<img alt="" src="assets/images/image_12.png"></p>
<p>	Cufon provides a simple way to include your custom font across all modern browsers. This technology is based on JavaScript and work with nearly every font you can imagine.</p>
<h5>
	How to include a custom font:</h5>
<ul>	<li>		go to the <a href="http://cufon.shoqolate.com/generate/">cufon website</a></li>
	<li>		Fill out the form</li>
	<li>		You get a Javascript file which you have to upload somewhere</li>
	<li>		Paste the link into the field</li>
</ul>
<h4 id="customisation_styles">Styles</h4>
<p>	I prepared some Styles:</p>
<p class="warning">
	This is a warning</p>
<p class="info">
	This is a info</p>
<pre class="prettyprint lang-plain linenums">
This is just plain text
</pre>
<pre class="prettyprint lang-js linenums">
function javascript(){
	alert(&#39;this is a javascript function&#39;);
}
</pre>
<pre class="prettyprint lang-css linenums">
#cssblock{
	width:999px;
}
</pre>
<pre class="prettyprint lang-php linenums">
&lt;?php
	echo &#39;Hello PHP&#39;;
?&gt;
</pre>
<pre class="prettyprint lang-html linenums">
&lt;div id=&quot;html&quot;&gt;
	I am HTML!
&lt;/div&gt;
</pre>
</section>
<section id="syntaxhighlighter">
	<div class="page-header"><h3>SyntaxHighlighter</h3><hr class="notop"></div>
<p>	<strike>I&#39;m using the <a href="http://alexgorbatchev.com/SyntaxHighlighter/">SyntaxHighlighter</a> by Alex Gorbatchev which is awesome!</strike></p>
<p>	Since version 2.0 <a href="https://code.google.com/p/google-code-prettify/">Google Code Prettify</a></p>
<p>	<img alt="" src="assets/images/image_5.png"></p>
<p>	Currently the Documenter can handle following syntax&#39;s:</p>
<ul>	<li>		Plain Text</li>
	<li>		PHP</li>
	<li>		JavaScript</li>
	<li>		HTML/XHTML</li>
	<li>		CSS</li>
</ul>
<p>	I don&#39;t think we need more</p>
</section>
<section id="custom_classes">
	<div class="page-header"><h3>Custom Classes</h3><hr class="notop"></div>
<p>	For more customisation I included custom classes</p>
<p>	A custom class converts</p>
<pre class="prettyprint lang-html linenums">
&lt;p&gt;
contents
&lt;/p&gt;
</pre>
<p>	into</p>
<pre class="prettyprint lang-html linenums">
&lt;p class=&quot;c_{number}&quot;&gt;
contents
&lt;/p&gt;
</pre>
<p class="info">
	{number} is a placeholder for a number from 1 to 9</p>
<p>	You can style this paragraph within a <a href="#customisation">custom CSS file</a></p>
<p>	Here five examples of custom classes:</p>
<hr>
<p class="c_1">
	Custom Style 1</p>
<p class="c_2">
	Custom Style 2</p>
<p class="c_3">
	Custom Style 3</p>
<p class="c_4">
	Custom Style 4</p>
<p class="c_5">
	Custom Style 5</p>
<hr>
<p class="info">
	You can access custom classes in the very left drop down of the toolbar</p>
</section>
<section id="inline_linking_deeplinks">
	<div class="page-header"><h3>Inline Linking & Deeplinks</h3><hr class="notop"></div>
<h4 id="inline_linking_deeplinks_inline_linking">Inline Linking</h4>
<p>	You can use &lt;a&gt; tag to jump from on section to another:</p>
<p>	Just name the href of the a with the id of the section:</p>
<pre class="prettyprint lang-html linenums">
&lt;a href=&quot;#features&quot;&gt;Go to Features&lt;/a&gt;
</pre>
<p>	<a href="#features">Go to Features</a></p>
<h4 id="inline_linking_deeplinks_deeplink">Deeplink</h4>
<p>	If you like to refer to a specific section of your documentation you can simple ad the hastag at the end of the url:</p>
<p>	<a href="http://revaxarts-themes.com/leaf/docs/">http://revaxarts-themes.com/leaf/docs/</a></p>
<p>	comes</p>
<p>	<a href="http://revaxarts-themes.com/leaf/docs/#the_template_builder">http://revaxarts-themes.com/leaf/docs/#the_template_builder</a></p>
<p>	the hash is the id of the section</p>
</section>
<section id="autosave">
	<div class="page-header"><h3>Autosave</h3><hr class="notop"></div>
<p>	You can automatically save your work and restore it later if your browser crashes.</p>
<p>	<img alt="" src="assets/images/image_14.jpg" style="width: 236px; height: 66px"></p>
<ul>	<li>		activate autosaving with the button</li>
	<li>		the Documenter will save your work every 30 seconds</li>
	<li>		load last saved version via the left button.</li>
	<li>		If your browser crashes or you reload the page you can restore the latest state of your doc</li>
</ul>
<p class="warning">
	Your saved doc will stay available one week after creation</p>
</section>
<section id="json_import_export">
	<div class="page-header"><h3>JSON Import/Export</h3><hr class="notop"></div>
<h4 id="json_import_export_export">Export</h4>
<p>	When you have finished your documentation you can save your work wherever you like.</p>
<p>	<img alt="" src="assets/images/image_2.jpg" style="width: 644px; height: 124px"></p>
<p>	Just copy all the contents of the box at the very bottom.</p>
<h4 id="json_import_export_import">Import</h4>
<p>	You can import that string by pasting it into the import field or enter the URL to the JSON file</p>
<p>	<img alt="" src="assets/images/image_1.jpg" style="width: 649px; height: 189px"></p>
<p>	Click outside the box and the Documenter will generate your documentation.</p>
<p>	&nbsp;</p>
</section>
<section id="save_your_docs">
	<div class="page-header"><h3>Save your Docs</h3><hr class="notop"></div>
<p>	You can save your documentations. You need a webserver which can handle php files.</p>
<h4 id="save_your_docs_how_it_works">How it works</h4>
<p>	Enter the URL of your script which handles the <a href="#advanced_options">Advanced Options</a></p>
<p>	<img alt="" src="assets/images/image_11.jpg"></p>
<p>	You script must return the URL of the saves JSON file</p>
<p class="small">
	You can find an example script <a href="http://pastebin.com/7FXBe3MC">here</a></p>
<p class="small">
	After you have built your documentation you can find a button at the &quot;custom docs&quot; section</p>
<p class="small">
	<img alt="" src="assets/images/image_6.jpg"  ></p>
<p class="small">
	&nbsp;</p>
</section>
<section id="advanced_options">
	<div class="page-header"><h3>Advanced Options</h3><hr class="notop"></div>
<p>	The Advance Options gives you a possiblity to send the documentation to your server. Furthermore it&#39;s used to save documentation.</p>
<p>	<img alt="" src="assets/images/image_8.jpg" style="width: 481px; height: 238px"></p>
<p>	You can enter URL to a script located on your server which recives the JSON or the zip file.</p>
<p>	You can enter a password in the third field which will get included so you can check it on your server.</p>
<p>	If you set a URL for the JSON these variables will get sent to the server:</p>
<pre class="prettyprint lang-php linenums">
$_POST = array(
   &#39;json&#39; =&gt; THE_JSON_OF_YOUR_DOC
   &#39;pwd&#39; =&gt; MD5_HASH_OF_YOUR_PASSWORD
)
</pre>
<p>	If you set a URL for the ZIP file these variables will get sent to the server:</p>
<pre class="prettyprint lang-php linenums">
$_POST = array(
 &#39;name&#39; =&gt; &#39;documentation.zip&#39;,
 &#39;pwd&#39; =&gt; MD5_HASH_OF_YOUR_PASSWORD 
)
$_FILES = array(
   &#39;file&#39; =&gt; array(
      &#39;name&#39; =&gt; &#39;documentation.zip&#39;,
      &#39;type&#39; =&gt; &#39;application/octet-stream&#39;,
      &#39;tmp_name&#39; =&gt; TEMP_FILE_NAME,
      &#39;error&#39; =&gt; 0,
      &#39;size&#39; =&gt; FILESIZE
  )
)
&lt;/pre&gt;</pre>
<p>	You can start with <a href="http://pastebin.com/7FXBe3MC">this script</a> and modify it for your needs</p>
</section>
<section id="changelog">
	<div class="page-header"><h3>Changelog</h3><hr class="notop"></div>
<h4 id="changelog_version_20_20_06_2012_">Version 2.0 (20/06/2012)</h4>
<pre class="prettyprint lang-plain linenums">
New Twitter Bootstrap
</pre>
<h4 id="changelog_version_16_12_10_2011_">Version 1.6 (12/10/2011)</h4>
<pre class="prettyprint lang-plain linenums">
Added Favicon support
better iOS 5 support
</pre>
<h4 id="changelog_version_15_09_12_2011_">Version 1.5 (09/12/2011)</h4>
<pre class="prettyprint lang-plain linenums">
Added Save functionality
Drop Pastebin integration
New Look!
Bug fixes
</pre>
<h4 id="changelog_version_14_06_25_2011_">Version 1.4 (06/25/2011)</h4>
<pre class="prettyprint lang-plain linenums">
Submenu Support
Bug fixes
</pre>
<h4 id="changelog_version_13_03_28_2011_">Version 1.3 (03/28/2011)</h4>
<pre class="prettyprint lang-plain linenums">
Autosave feature
Custom CSS file
Custom Classes
Background Image Support
Browser Back Button Support
Validation for URLs and E-Mails
Removed the wrapper in the HTML Structure (use the body instead)
Some optical improvements
Some technical improvements
Bug fixes
</pre>
<h4 id="changelog_version_12_03_17_2011_">Version 1.2 (03/17/2011)</h4>
<pre class="prettyprint lang-plain linenums">
support for iPhone, iPod Touch, iPad
deeplinking support
Navigation gets a scrollbar if it gets out of view
External links are no opening in a new window
No more empty fields in the documentation
New Field: Website
4 new Themes
Bug fixes</pre>
<h4 id="changelog_version_11_03_12_2011_">Version 1.1 (03/12/2011)</h4>
<pre class="prettyprint lang-plain linenums">
Themeselecter
Easy Easing
&ldquo;today&rdquo; checkbox for last Update
E-mail addresses are now encoded (simple spam protection)
Bug fixes</pre>
<p>	&nbsp;</p>
</section>
<section id="source_credits">
	<div class="page-header"><h3>Source & Credits</h3><hr class="notop"></div>
<p>	Thanks so much to</p>
<ul>	<li>		<a href="http://jquery.com/">jQuery</a></li>
	<li>		<a href="http://jqueryui.com/">jQueryUI</a></li>
	<li>		<a href="http://gsgd.co.uk/sandbox/jquery/easing/">jQuery Easing Plugin</a></li>
	<li>		<a href="http://ckeditor.com/">ckEditor</a></li>
</ul>
<p>	&nbsp;</p>
</section>
<section id="supporters">
	<div class="page-header"><h3>Supporters</h3><hr class="notop"></div>
<p>	List of all the kind people who donated:</p>
<ul>	<li>		<a href="http://themeforest.net/user/DDStudios?ref=revaxarts">DDStudios</a></li>
	<li>		M. Schinis</li>
	<li>		<a href="http://codecanyon.net/user/JonasDoebertin?ref=revaxarts">JonasDoebertin</a></li>
	<li>		<a href="http://themeforest.net/user/hogash?ref=revaxarts">hogash</a></li>
	<li>		N. Payne</li>
	<li>		O. Hebel<!--
</ul-->
		<p>			If you wan&#39;t to get into this list please <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&amp;business=paypal%40revaxarts%2ecom&amp;lc=US&amp;item_name=The%20Documenter%20by%20revaxarts&amp;no_note=0&amp;currency_code=USD&amp;bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHostedGuest">donate</a> any amount</p>
	</li>
</ul>
</section>
<section id="what_else">
	<div class="page-header"><h3>What else</h3><hr class="notop"></div>
<p>	I spent a lot of time on this thing. Nevertheless it&#39;s still not finished. I like to improve it wherever I can and appreciate your feedback.</p>
<p>	Best wishes</p>
<p>	Xaver Birsak, revaxarts.com</p>
<p>	<a href="http://themeforest.net/user/revaxarts?ref=revaxarts">http://themeforest.net/user/revaxarts</a></p>
</section>

	</div>
</body>
</html>