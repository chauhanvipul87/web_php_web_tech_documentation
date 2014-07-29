package com.iana.boesc;

import java.beans.BeanInfo;
import java.beans.Introspector;
import java.beans.PropertyDescriptor;
import java.lang.reflect.Method;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.sql.Statement;

	
class BOESCConfigVo2{
	
	private String ftpUserName;
	private String ftpPassword;
   
	public String getFtpUserName() {
		return ftpUserName;
	}
	public void setFtpUserName(String ftpUserName) {
		this.ftpUserName = ftpUserName;
	}
	
	public String getFtpPassword() {
		return ftpPassword;
	}
	public void setFtpPassword(String ftpPassword) {
		this.ftpPassword = ftpPassword;
	}
	@Override
	public String toString() {
		return "BOESCConfigVo [ftpUserName=" + ftpUserName+"]";
	}
}

class UserLogin{
	
	private String user_name;
	private String password;
	private String first_name;
	private String last_name;
	private int delete_flag;
	
	public String getUser_name() {
		return user_name;
	}
	public void setUser_name(String user_name) {
		this.user_name = user_name;
	}
	public String getPassword() {
		return password;
	}
	public void setPassword(String password) {
		this.password = password;
	}
	public String getFirst_name() {
		return first_name;
	}
	public void setFirst_name(String first_name) {
		this.first_name = first_name;
	}
	public String getLast_name() {
		return last_name;
	}
	public void setLast_name(String last_name) {
		this.last_name = last_name;
	}
	public int getDelete_flag() {
		return delete_flag;
	}
	public void setDelete_flag(int delete_flag) {
		this.delete_flag = delete_flag;
	}
	
	@Override
	public String toString() {
		return "UserLogin [user_name=" + user_name + ", password=" + password
				+ ", first_name=" + first_name + ", last_name=" + last_name
				+ ", delete_flag=" + delete_flag + "]";
	}
	
}

public class DVIRHandler {
	
	public Connection getConnection(){
		 Connection conn = null;
		   try{
		      //STEP 2: Register JDBC driver
		      Class.forName(JDBC_DRIVER);
		      //STEP 3: Open a connection
		      System.out.println("Connecting to database...");
		      conn = DriverManager.getConnection(DB_URL,USER,PASS);
		   }catch(Exception e){
			   e.printStackTrace();
		   }
		     return conn; 
	}
	
    // JDBC driver name and database URL
    static final String JDBC_DRIVER = "com.mysql.jdbc.Driver";  
    static final String DB_URL = "jdbc:mysql://localhost/test";
    //  Database credentials
	static final String USER = "root";
	static final String PASS = "admin";
	
	
	 public void getPropertyValue(Object javaBean, String propertyName) {   
	       try {  
	           BeanInfo bi = Introspector.getBeanInfo(javaBean.getClass());  
	           PropertyDescriptor pds[] = bi.getPropertyDescriptors();  
	           for (PropertyDescriptor pd : pds) {  
	               if (pd.getName().equals(propertyName)) {  
	                   Method obj = pd.getReadMethod();
	                   Method getter = new PropertyDescriptor(propertyName, javaBean.getClass()).getReadMethod();
	                   System.out.println(getter.getDefaultValue());
	                   System.out.println(getter.getName());
	                   System.out.println(getter.getDefaultValue());
	               }  
	           }  
	       } catch (Exception e) {  
	           e.printStackTrace();  
	       }  
	   }  
	
	 public void showProperties(Object bean) {
		 	try{
			    BeanInfo info = Introspector.getBeanInfo(bean.getClass(), Object.class);  
			    PropertyDescriptor[] props = info.getPropertyDescriptors();  
			    for (PropertyDescriptor pd : props) {  
			        String name = pd.getName();  
			        Method getter = pd.getReadMethod();  
			        Class<?> type = pd.getPropertyType();  
			        Object value = getter.invoke(bean);  
			        System.out.println(name + " = " + value + "; type = " + type);  
			    }  
		 	}catch(Exception e){
		 		e.printStackTrace();
		 	}
		}  
	
	 public static void main(String[] args) {
			
			String query ="INSERT INTO USERLOGIN (USER_NAME,PASSWORD,FIRST_NAME,LAST_NAME,DELETE_FLAG) VALUES(?,?,?,?,?)";
			UserLogin l = new UserLogin();
			l.setUser_name("ChauhanVipul");
			l.setFirst_name("Vipul");
			l.setLast_name("Chauhan");
			l.setPassword("vipul@admin");
			l.setDelete_flag(0);
			try {
				QueryRunner run = new QueryRunner(new DVIRHandler().getConnection());
				run.save(query,new Object[]{"ChauhanVipul","vipul@admin","Vipul","Chauhan",0});
				run = new QueryRunner(new DVIRHandler().getConnection());
				run.saveBean(query, l);
			} catch (DBUtilsException e) {
				e.printStackTrace();
			} catch (SQLException e) {
				e.printStackTrace();
			}
			
			BOESCConfigVo2 vo = new BOESCConfigVo2();
			vo.setFtpUserName("BOESC");
			//new BOESCHandler().getPropertyValue(vo, "ftpUserName");
			//new DVIRHandler().showProperties(vo);
		}
}
