<div class="page-header"><h3>Generics</h3><hr class="notop"></div>
<ol>
<li>
<div id="how_get_bean_prop">
<h4>How to get any Bean properties using Generics? </h4>
Following main important classes are used to get bean properties :
<p>
	<strong>Class Introspector ::</strong> The Introspector class provides a 
		standard way for tools to learn about the properties, events, and methods supported by
		a target Java Bean.
		For each of those three kinds of information, the Introspector will separately analyze the bean's class and superclasses looking for either explicit or implicit information and use that information to build a BeanInfo object that comprehensively describes the target bean.
		<br/>
		
	<strong>Class PropertyDescriptor ::</strong> A PropertyDescriptor describes one property that a Java Bean exports via a pair of accessor methods. <br/>
	Also used <strong>java.lang.reflect.Method</strong> class to get bean properties values on fly.
</p>	

 

Here you can check following two files to get bean properties.

<br/>
<h6>File Name :GetBeanValuesTest.java </h6>
<pre class="prettyprint linenums">
<code class="language-java" id="how_get_bean_prop_ex">
package com.vips.main;

import java.beans.BeanInfo;
import java.beans.Introspector;
import java.beans.PropertyDescriptor;
import java.lang.reflect.Method;

public class GetBeanValuesTest {
	
     public &lt;T&gt; void showProperties(T bean) {
		 	try{
			    BeanInfo info = Introspector.getBeanInfo(bean.getClass(), Object.class);  
			    PropertyDescriptor[] props = info.getPropertyDescriptors();  
			    for (PropertyDescriptor pd : props) {  
			        String name = pd.getName();  
			        Method getter = pd.getReadMethod();  
			        Class&lt;?&gt; type = pd.getPropertyType();  
			        Object value = getter.invoke(bean);  
			        System.out.println(name + " = " + value + "; type = " + type);  
			    }  
		 	}catch(Exception e){
		 		e.printStackTrace();
		 	}
		}  
	
	 public static void main(String[] args) {
			
			UserLogin user = new UserLogin();
			user.setUserName("ChauhanVipul");
			user.setFirstName("Vipul");
			user.setLastName("Chauhan");
			user.setPassWord("vipul@admin");
			user.setDeleteFlag(0);
			try {
                  new GetBeanValuesTest().showProperties(user);  
             }catch (Exception e) {
                  e.printStackTrace();
			 }
		}
}
</code>
</pre>
<h6>File Name :UserLogin.java</h6>
<pre class="prettyprint linenums">
<code class="language-java">
package com.vips.main;

public class UserLogin {
		
	private String userName;
	private String passWord;
	private String firstName;
	private String lastName;
	private int deleteFlag;

	public String getUserName() {
		return userName;
	}
	public String getPassWord() {
		return passWord;
	}
	public String getFirstName() {
		return firstName;
	}
	public String getLastName() {
		return lastName;
	}
	public int getDeleteFlag() {
		return deleteFlag;
	}
	public void setUserName(String userName) {
		this.userName = userName;
	}
	public void setPassWord(String passWord) {
		this.passWord = passWord;
	}
	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}
	public void setLastName(String lastName) {
		this.lastName = lastName;
	}
	public void setDeleteFlag(int deleteFlag) {
		this.deleteFlag = deleteFlag;
	}
}
</code>
</pre>
</div>
</li>
<li>
<h4>How to store an excel fields to bean properties using Generics Or How to generate an Excel file ?</h4>
This section actually comes under Excel Utility Section but same link is provided here because it's a full of 
Generics program. <br/>
This Section is already covered in Excel Utility Section: <a href="#!/how_gen_excel">Click here to view this session</a>

</ol>



