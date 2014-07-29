<div class="page-header"><h3>XMLConfiguration</h3><hr class="notop"></div>
<ol>
<li>
<div id="how_to_cofigure_datasource">
<h4>How to configure DataSource in XML?</h4>
   There are two ways to configure dataSource in Spring XML.  
   <p>1. Supply direct database configuration properties in dataSource bean from line no: 14.</p>
   <p>2. Configure database related setting in properties file & get database properties values as key.</p>
   <p> Here I will show you second number example that read db setting from .properties file & injected into dataSource bean. </p>
   <p> Context Property placeholder is used to load db setting from specified .properties file, please make sure that your file should be 
	available at given location.  </p>	
	<strong>Download Source File :</strong><a href="download/how_to_cofigure_datasource.rar"> SRC Files</a>
<h6>File Name :jdbc.properties </h6>
<pre class="prettyprint linenums">
<code class="language-xml">
jdbc.driverClassName = com.mysql.jdbc.Driver
jdbc.url = jdbc:mysql://localhost:3306/boesc
jdbc.username = root
jdbc.password = admin
</code>
</pre>
	
	
<h6>File Name :spring-context.xml </h6>
<pre class="prettyprint linenums">
<code class="language-xml">
&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;beans xmlns="http://www.springframework.org/schema/beans"
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xmlns:context="http://www.springframework.org/schema/context"
	xsi:schemaLocation="http://www.springframework.org/schema/beans http://www.springframework.org/schema/beans/spring-beans.xsd
		http://www.springframework.org/schema/context http://www.springframework.org/schema/context/spring-context.xsd"&gt;
	
	&lt;!-- Root Context: defines shared resources visible to all other web components --&gt;
	&lt;!-- load values DB configuration values  from properties file --&gt;
	&lt;context:property-placeholder location="/WEB-INF/spring/jdbc.properties"/&gt;
	
	&lt;!-- DB configuration   --&gt;
	&lt;bean id="dataSource" class="org.apache.commons.dbcp.BasicDataSource" destroy-method="close"&gt;
		&lt;property name="driverClassName" value="${jdbc.driverClassName}"/&gt;
	    &lt;property name="url" value="${jdbc.url}"/&gt;
	    &lt;property name="username" value="${jdbc.username}"/&gt;
	    &lt;property name="password" value="${jdbc.password}"/&gt;
	&lt;/bean&gt;		
				
&lt;/beans&gt;
</code>
</pre>
</div>
</li>
<li>
<div id="how_to_cofigure_internationalization">
<h4>How to configure i18N Internationalization in XML?</h4>
   <p> Here you can see in example, Class ResourceBundleMessageSource is used to configure internationalization in our application. </p>
   <p> If we use internationalization functionality then one can able to change website languages as per their region. <br/>For Ex: By Default our web site is 
   running in English language but if our end user from Germany, don't know English language and if he want to read out web site content in his local language than it's only possible using i18N support. </p>
	<p> To implement i18N in our application, we need to create mainly two files for any languages. One is for loading messages & second is for labels.</p>
   	<strong>Download Source File :</strong><a href="download/how_to_cofigure_internationalization.rar"> SRC Files</a>

<h6>File Name :spring-context.xml </h6>
<pre class="prettyprint linenums">
<code class="language-xml">
&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;beans xmlns="http://www.springframework.org/schema/beans"
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xmlns:context="http://www.springframework.org/schema/context"
	xsi:schemaLocation="http://www.springframework.org/schema/beans http://www.springframework.org/schema/beans/spring-beans.xsd
		http://www.springframework.org/schema/context http://www.springframework.org/schema/context/spring-context.xsd"&gt;
	
	&lt;!-- load messages & labels from properties file  --&gt;
	&lt;bean id="messageSource" class="org.springframework.context.support.ResourceBundleMessageSource"&gt;
    &lt;property name="basenames"&gt;
      &lt;list&gt;
        &lt;value&gt;messages&lt;/value&gt;
        &lt;value&gt;labels&lt;/value&gt;
      &lt;/list&gt;
    &lt;/property&gt;
  &lt;/bean&gt;
			
&lt;/beans&gt;
</code>
</pre>
</div>
</li>

<div id="multiple_view_resolver">
<h4>How to set multiple view resolver in spring application? </h4>
   <p>You should have question in your find that is it possible to set multiple view resolver in our spring application ? </p>
   <p><strong>Answer is :: Yes</strong> We can set multiple view resolver by configuring Spring XML   </p>
   <p>Consider that we want to resolve result page by following two ways.  </p>
   <p><strong>1. By Using Tiles <br/>
   2. By Internal View Resolver : Based on file name &amp; Path. </strong></p>
    <p>  <strong>Multiple view resolver is achieved by providing order no to view resolver</strong>, As you can see at line no :16 , We have a bean property having <strong>'order'</strong> as name attribute &amp; <strong>value='0'</strong>. This bean is instruct to 
	Spring view resolver to check order of preference before going to render any result page. <strong>Order always starts from 0 index s
	so whatever the bean configured at 0 position, will execute first while rendering page then after subsequent 
	resolver.</strong></p>
	<p>As you can see in our example that initially check return URL with in <strong>'tiles-definitions.xml'</strong> if mapping is not found then it will check for file path related to return URL.  </p>
	<strong>Download Source File :</strong><a href="download/multiple_view_resolver.rar"> SRC Files</a>
<h6>File Name :spring-context.xml </h6>
<pre class="prettyprint linenums">
<code class="language-xml">
&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;beans:beans 
    xmlns:mvc="http://www.springframework.org/schema/mvc"
	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xmlns:beans="http://www.springframework.org/schema/beans"
	xmlns:context="http://www.springframework.org/schema/context"
	xmlns:aop="http://www.springframework.org/schema/aop"
	xsi:schemaLocation="http://www.springframework.org/schema/mvc http://www.springframework.org/schema/mvc/spring-mvc.xsd
		http://www.springframework.org/schema/beans http://www.springframework.org/schema/beans/spring-beans.xsd
		http://www.springframework.org/schema/context http://www.springframework.org/schema/context/spring-context.xsd
		http://www.springframework.org/schema/aop http://www.springframework.org/schema/aop/spring-aop.xsd"&gt;

	&lt;!-- initially check for tiles view if not found then it will be going to check in the /WEB-INF/views directory. --&gt;
	
	&lt;beans:bean id="tilesviewResolver" class="org.springframework.web.servlet.view.tiles2.TilesViewResolver"&gt;
		&lt;beans:property name="order" value="0" /&gt;
	&lt;/beans:bean&gt;
	
	&lt;beans:bean class="org.springframework.web.servlet.view.tiles2.TilesConfigurer" id="tilesConfigurer"&gt;
	&lt;beans:property name="definitions"&gt;
	    &lt;beans:list&gt;
			&lt;beans:value&gt;/WEB-INF/spring/tiles-definitions.xml&lt;/beans:value&gt;
	    &lt;/beans:list&gt;
	&lt;/beans:property&gt;
	&lt;/beans:bean&gt;
	
	&lt;!-- Resolves views selected for rendering by @Controllers to .jsp resources in the /WEB-INF/views directory --&gt;
	 &lt;beans:bean class="org.springframework.web.servlet.view.InternalResourceViewResolver"&gt;
		&lt;beans:property name="prefix" value="/WEB-INF/views/" /&gt;
		&lt;beans:property name="suffix" value=".jsp" /&gt;
		&lt;beans:property name="order" value="1" /&gt;
	&lt;/beans:bean&gt; 
	
	
&lt;/beans:beans&gt;
</code>
</pre>
</div>
</li>



</ol>



