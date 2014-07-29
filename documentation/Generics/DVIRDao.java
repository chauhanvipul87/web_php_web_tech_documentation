package com.iana.boesc;

import java.beans.BeanInfo;
import java.beans.IntrospectionException;
import java.beans.Introspector;
import java.beans.PropertyDescriptor;
import java.lang.reflect.InvocationTargetException;
import java.lang.reflect.Method;
import java.util.ArrayList;
import java.util.List;

class BOESCConfigVo1{
	
	 private String ftpURL;
	 private String ftpPassword; 
	 
	 public String getFtpURL() {
			return ftpURL;
	 }
	 public void setFtpURL(String ftpURL) {
			this.ftpURL = ftpURL;
	 }
	 public String getFtpPassword() {
			return ftpPassword;
	 }
	 public void setFtpPassword(String ftpPassword) {
		this.ftpPassword = ftpPassword;
	 }
	 
	 
	 @Override
		public String toString() {
			return "BOESCConfigVo1 [ftpURL=" + ftpURL + ",ftpPassword=" + ftpPassword + "]";
		}
}

class BOESCConfigVo{
		
		private String ftpUserName;
	   
		
		public String getFtpUserName() {
			return ftpUserName;
		}
		public void setFtpUserName(String ftpUserName) {
			this.ftpUserName = ftpUserName;
		}
		@Override
		public String toString() {
			return "BOESCConfigVo [ftpUserName=" + ftpUserName+"]";
		}
}
public class DVIRDao {
	
	 public <T> Class<T> setPropertyValue(Class<T> target, List<String> propertyNameList, Object propertyValue) {   
		 	T bean = null; 
		    try {  
		    	if(propertyNameList == null || propertyNameList.size() ==0) return null;
		    	bean = this.newInstance(target);	
		    	PropertyDescriptor[] pds = this.getPropertyDescriptorsInfo(target);
		    	this.callSetter(propertyNameList,pds,bean,propertyValue);
		       
		        
		    } catch (Exception e) {  
		        e.printStackTrace();  
		    }  
		    System.out.println("Java Bean ::"+bean);
			return target;
		}
	 public <T> T newInstance(Class<T> target ) throws InstantiationException,IllegalAccessException{
		return target.newInstance();
		
	 }
	 
	 public <T> void callSetter(List<String> propertyNameList,PropertyDescriptor[] pds, T bean,Object propertyValue ){
		 for(int  i= 0; i < propertyNameList.size() ;i++){
	        	for (PropertyDescriptor pd : pds) {  
		            if (pd.getName().equals(propertyNameList.get(i))) {  
		                Method setter = pd.getWriteMethod();  
		                if (setter != null) {  
		                    try {
								setter.invoke(bean, new Object[] {propertyValue} );
								
							} catch (IllegalArgumentException e) {
								e.printStackTrace();
							} catch (IllegalAccessException e) {
								e.printStackTrace();
							} catch (InvocationTargetException e) {
								e.printStackTrace();
							}  
		                }  
		            }
		        }  
	        }
	 }
	 
	 public PropertyDescriptor[]  getPropertyDescriptorsInfo(Class<?> target ) throws IntrospectionException{
		 BeanInfo bi = Introspector.getBeanInfo(target);  
	     PropertyDescriptor pds[] = bi.getPropertyDescriptors();
	     return pds;
	 }
	 
	 public static void main( String[] args ){
		   System.out.println("in main method ");
		   List<String> propertyNameList = new ArrayList<String>();
		   propertyNameList.add("ftpURL");
		   propertyNameList.add("ftpPassword");
		   
		   //propertyNameList.add("ftpUserName");
		   
		   
		   new DVIRDao().setPropertyValue(BOESCConfigVo1.class, propertyNameList, new String("BOESC"));
	    }
}
