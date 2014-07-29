package com.vips.main;

import java.util.ArrayList;
import java.util.List;

import org.apache.log4j.Logger;
import org.apache.poi.hssf.usermodel.HSSFSheet;

class BOESCSearchDetails{
	
	private String userName;
	private String password;
	public String getUserName() {
		return userName;
	}
	public void setUserName(String userName) {
		this.userName = userName;
	}
	public String getPassword() {
		return password;
	}
	public void setPassword(String password) {
		this.password = password;
	}
}

public class ExcelFillManager extends AbstractExcelFileManager {
	Logger logger = Logger.getLogger(ExcelFillManager.class);
	public static void testMethod(){
		String[] headerArray 		={"User Name", "Password"};
		String[] propertyListToShow ={"userName", "password"};
		BOESCSearchDetails boesc = new BOESCSearchDetails();
		boesc.setUserName("Vipul");
		boesc.setPassword("vipul@admin");
		List<BOESCSearchDetails> lst= new ArrayList<BOESCSearchDetails>();
		lst.add(boesc);
		try {
			new ExcelFillManager().generateExcelSheet("BOESC Reports","BOESC USer List",headerArray,propertyListToShow,lst);
		} catch (WrongConfigurationException e) {
			System.out.println(e.getMessage());
			e.printStackTrace();
		}
	}
	
	public static void main(String[] args) {
		testMethod();
		
	}
	

}
