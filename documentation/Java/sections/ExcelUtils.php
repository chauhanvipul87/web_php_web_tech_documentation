<div class="page-header"><h3>Excel Utility</h3><hr class="notop"></div>
<ol>
<li>
<div id="how_gen_excel">
<h4>How to store an excel fields to bean properties using Generics Or How to generate an Excel file ?</h4>
<p> In order to generate an excel file, you should have POI jar downloaded in your class path. <br/>
Following three classes are used to generate an excel file.<br/>
<strong>1. AbstractExcelFileManager :</strong> This class contains an abstract functionality to generate any excel file.<br/>
<strong>2. WrongConfigurationException :</strong> Programmer must have to catch exception from WrongConfigurationException because 
whatever an exception is raised will be thrown by this class.<br/>
<strong>3. ExcelFillManager : </strong>This is our test class, as you know we have developed generic functionality to generate any
excel file so we required following parameters to call a method.<br/>
<strong>1. Sheet Name,</strong><br/>
<strong>2. Report Name,</strong><br/>
<strong>3. Header Array : like It can be String[] Or Object[],</strong><br/>
<strong>4. propertyListToShow : list of properties to show, means bean contains lot of properties but you don't 
want to show all fields in excel so please pass only those fields name which you want to make as a column in excel sheet,</strong><br/>
<strong>5. lst : this is nothing but result set List of beans which is generated from Database.</strong><br/>
<br/>
<strong>Download Source File :</strong> <a href="download/Excel_Generation.rar" >SRC Files</a>
<br/>
<h6>File Name :AbstractExcelFileManager.java</h6>
<pre class="prettyprint linenums">
<code class="language-java">
package com.vips.main;

import java.beans.BeanInfo;
import java.beans.IntrospectionException;
import java.beans.Introspector;
import java.beans.PropertyDescriptor;
import java.lang.reflect.Array;
import java.lang.reflect.Method;
import java.util.Date;
import java.util.List;

import org.apache.poi.hssf.usermodel.HSSFCell;
import org.apache.poi.hssf.usermodel.HSSFCellStyle;
import org.apache.poi.hssf.usermodel.HSSFRow;
import org.apache.poi.hssf.usermodel.HSSFSheet;
import org.apache.poi.hssf.usermodel.HSSFWorkbook;
import org.apache.poi.hssf.util.HSSFColor;
import org.apache.poi.ss.usermodel.CellStyle;
import org.apache.poi.ss.usermodel.Font;
import org.apache.poi.ss.util.CellRangeAddress;

public abstract class AbstractExcelFileManager {

	protected &lt;T&gt; boolean validateHeaderArr(T[] headerArray) throws WrongConfigurationException{
		if(headerArray ==null || headerArray.length == 0)
			throw new WrongConfigurationException("Please send valid header list , Header list should not be empty.");
		return true;
	}
	
	protected &lt;T&gt; boolean validateProperyArray(T[] propertyListToShow) throws WrongConfigurationException{
		if(propertyListToShow ==null || propertyListToShow.length == 0)
			throw new WrongConfigurationException("Please send valid property list , Property list should not be empty.");
		return true;
	}

	protected &lt;T&gt; boolean isSameHeaderPropertyMapping(T[] headerArray,T[] propertyListToShow) throws WrongConfigurationException{
		if(headerArray.length != propertyListToShow.length)
			throw new WrongConfigurationException("Supplied header column is not matched with property list.");
		return true;
	}
	
	protected &lt;T&gt; boolean validateInputData(String sheetName,String excelReportTitle,T[] headerArray,
					T[] propertyListToShow,List&lt;?&gt; listResultBean) throws WrongConfigurationException{
		try {
			
			if(sheetName ==null || sheetName.isEmpty())
				throw new WrongConfigurationException("Please supply proper sheet name.");
			
			if(excelReportTitle ==null || excelReportTitle.isEmpty())
					throw new WrongConfigurationException("Please supply proper report title.");	
			
			if(listResultBean ==null || listResultBean.size()==0){
				throw new WrongConfigurationException("Please provide valid result list details.");
			}else {
				PropertyDescriptor [] pd = this.getPropertyDescriptor(listResultBean.get(0));
				if(pd ==null || pd.length ==0)
					throw new WrongConfigurationException("There is no getter /setter "+
								" found in bean class. please create getter /setter method first.");
			}
			if(this.validateHeaderArr(headerArray) && 
						this.validateProperyArray(propertyListToShow) && 
						this.isSameHeaderPropertyMapping(headerArray,propertyListToShow)){
				return true;	
			}
			
		} catch (WrongConfigurationException e) {
			throw e;
		}
		return false;
	}
	
	 protected HSSFSheet createXLS(String sheetName) {
	   // logger.info("createXLS...");
	    // Create new workbook
	    HSSFWorkbook workbook = new HSSFWorkbook();
	    // Create new worksheet
	    HSSFSheet worksheet = workbook.createSheet(sheetName);
	    return worksheet;
	  }
	 
	 
	 /**
	   * Builds the report title and the date header
	   * 
	   * @param worksheet
	   * @param startRowIndex
	   *          starting row offset
	   * @param startColIndex
	   *          starting column offset
	   */
	 public &lt;T&gt; HSSFSheet  buildHeaders(HSSFSheet worksheet, int startRowIndex, int startColIndex, String title,T[] headerArray) {
		 int mergeTitle =headerArray.length-1;
		// Set column widths for report title.
		 for(int i =0; i&lt;= mergeTitle ;i++){
			 worksheet.setColumnWidth(i, 5000);
		 }

		// Create font style for the report title
	    Font fontTitle = worksheet.getWorkbook().createFont();
	    fontTitle.setBoldweight(Font.BOLDWEIGHT_BOLD);
	    fontTitle.setFontHeight((short) 280);

	    // Create cell style for the report title
	    HSSFCellStyle cellStyleTitle = worksheet.getWorkbook().createCellStyle();
	    cellStyleTitle.setAlignment(CellStyle.ALIGN_CENTER);
	    cellStyleTitle.setWrapText(true);
	    cellStyleTitle.setFont(fontTitle);

	    // Create report title
	    HSSFRow rowTitle = worksheet.createRow((short) startRowIndex);
	    rowTitle.setHeight((short) 500);
	    HSSFCell cellTitle = rowTitle.createCell(startColIndex);
	    cellTitle.setCellValue(title);
	    cellTitle.setCellStyle(cellStyleTitle);

	    // Create merged region for the report title
	    worksheet.addMergedRegion(new CellRangeAddress(0, 0, 0, mergeTitle));

	    // Create date header
	    HSSFRow dateTitle = worksheet.createRow((short) startRowIndex + 1);
	    HSSFCell cellDate = dateTitle.createCell(startColIndex);
	    cellDate.setCellValue("This report was generated at " + new Date());
	    
	    //Title : Row Start.. 
	    
	    // Create font style for the headers
	    Font font = worksheet.getWorkbook().createFont();
	    font.setBoldweight(Font.BOLDWEIGHT_BOLD);

	    // Create cell style for the headers
	    HSSFCellStyle headerCellStyle = worksheet.getWorkbook().createCellStyle();
	    headerCellStyle.setFillPattern(CellStyle.SOLID_FOREGROUND);
	    headerCellStyle.setFillForegroundColor(HSSFColor.GREY_25_PERCENT.index);
	    headerCellStyle.setAlignment(CellStyle.ALIGN_CENTER);
	    headerCellStyle.setVerticalAlignment(CellStyle.VERTICAL_CENTER);
	    headerCellStyle.setWrapText(true);
	    headerCellStyle.setFont(font);
	    headerCellStyle.setBorderBottom(CellStyle.BORDER_THIN);

	    // Create the column headers
	    HSSFRow rowHeader = worksheet.createRow((short) startRowIndex + 2);
	    rowHeader.setHeight((short) 500);
	    HSSFCell cell =null;
	    for(int i =0 ;i &lt;headerArray.length;i++){
	    	cell = rowHeader.createCell(startColIndex + i);
	    	cell.setCellValue(headerArray[i].toString());
	    	cell.setCellStyle(headerCellStyle);
	    }
	    
	    return worksheet;
	  }
	 
	 protected PropertyDescriptor[] getPropertyDescriptor(Object javaBean) throws WrongConfigurationException{
	        BeanInfo bi =null;
			try {
				bi = Introspector.getBeanInfo(javaBean.getClass(),Object.class);
			} catch (IntrospectionException e) {
				throw new WrongConfigurationException("Unable to get bean information.");
			}  
	        PropertyDescriptor pds[] = bi.getPropertyDescriptors();
			return pds; 
	 }
	 protected &lt;T&gt; Object getPropertyValue(Object javaBean, T propertyName)throws WrongConfigurationException{   
	       try {  
	           PropertyDescriptor pds[] = this.getPropertyDescriptor(javaBean);
	           for (PropertyDescriptor pd : pds) {  
	        	   if(propertyName.toString().isEmpty()) continue;
	               if (pd.getName().equals(propertyName.toString())) {  
	            	    String name = pd.getName();  
				        Method getter = pd.getReadMethod();  
				        Class&lt;?&gt; type = pd.getPropertyType();  
				        Object value = getter.invoke(javaBean);  
				        System.out.println(name + " = " + value + "; type = " + type); 
				        return value;
	               }  
	           }  
	       } catch (Exception e) { 
	    	   e.printStackTrace();
	           throw new WrongConfigurationException("Unable to get property value.");
	       }  
	       return "";
	   }  
	 
	@SuppressWarnings("unchecked")
	protected &lt;T&gt; T[] getMatchingColumnName(Object javaBean,T[] propertyListToShow) throws WrongConfigurationException{
		 int counter = 0;
		 T[] matchedArr =(T[]) Array.newInstance(propertyListToShow.getClass().getComponentType(), propertyListToShow.length);
		 PropertyDescriptor[] pd = this.getPropertyDescriptor(javaBean);
		 for(int i = 0; i&lt; propertyListToShow.length; i++){
		 for(int j = 0; j&lt; pd.length; j++){
				 PropertyDescriptor pds = pd [j];
				 if(pds.getName().equalsIgnoreCase(propertyListToShow[i].toString())){
					 System.out.println("pds.getName().toString()"+pds.getName().toString());
					 matchedArr [counter] = (T) propertyListToShow[i];
					 counter++;
				 }
			 }
		 }
		 if(propertyListToShow.length != counter){
			 throw new WrongConfigurationException("Please supplied valid property name same as bean.");
		 }
		 
		return matchedArr; 
	}
	 
	 public &lt;T&gt; HSSFSheet  fillWorkSheetData(HSSFSheet worksheet, int startRowIndex, 
				int startColIndex,T[] propertyListToShow,List&lt;?&gt; listResultBean) throws WrongConfigurationException{
		 System.out.println("Filling data into Users Excel Report...");
		 T[] matchingColsArr = this.getMatchingColumnName(listResultBean.get(0), propertyListToShow);
		 if(matchingColsArr ==null || matchingColsArr.length ==0)
				throw new WrongConfigurationException("No properties are matched with bean fields.");
		 System.out.println("Some properties are matched ::"); 
		 // Row offset
		 startRowIndex += 2;

		 // Create cell style for the body
		 HSSFCellStyle bodyCellStyle = worksheet.getWorkbook().createCellStyle();
		 bodyCellStyle.setAlignment(CellStyle.ALIGN_CENTER);
		 bodyCellStyle.setWrapText(true);
		 for(int i = 0 ; i &lt;listResultBean.size() ;i++){
			 // Create a new row
			 HSSFRow row = worksheet.createRow((short) startRowIndex + 1);
			 startRowIndex++;
			 int innerCount = 0;  
			 for (T val : matchingColsArr){
				 if(val ==null || val.toString().trim().equals("")) continue;

				 HSSFCell cell = row.createCell(innerCount);
				 cell.setCellValue(this.getPropertyValue(listResultBean.get(i), val).toString());
				 cell.setCellStyle(bodyCellStyle);
				 innerCount++;
			 }
		 }
			 
		return worksheet;
	 }
	 
	  public &lt;T&gt; HSSFSheet generateExcelSheet(String sheetName,String excelReportTitle,
		T[] headerArray,T[] propertyListToShow,List&lt;?&gt; listResultBean ) throws WrongConfigurationException{
		boolean properValue = this.validateInputData(sheetName,excelReportTitle, 
				headerArray,propertyListToShow,listResultBean);
		HSSFSheet worksheet  =null;
		if(properValue){
			
			//create a blank XLS file.
			worksheet = this.createXLS(sheetName);
			int startRowIndex = 0;
			int startColIndex = 0;
			// Build the title and date headers
			this.buildHeaders(worksheet, startRowIndex, startColIndex, excelReportTitle, headerArray);
			this.fillWorkSheetData(worksheet, startRowIndex, startColIndex,propertyListToShow,listResultBean);
		}
		return worksheet;
	}
	 
	
}
</code>
</pre>
<h6>File Name :WrongConfigurationException.java</h6>
<pre class="prettyprint linenums">
<code class="language-java">
package com.vips.main;

public class WrongConfigurationException extends Exception {

	private static final long serialVersionUID = 1L;
	
	private String message = null;
	 
    public WrongConfigurationException() {
        super();
    }
 
    public WrongConfigurationException(String message) {
        super(message);
        this.message = message;
    }
 
    public WrongConfigurationException(Throwable cause) {
        super(cause);
    }
 
    @Override
    public String toString() {
        return message;
    }
 
    @Override
    public String getMessage() {
        return message;
    }
}

</code>
</pre>
<h6>File Name :ExcelFillManager.java</h6>
<pre class="prettyprint linenums">
<code class="language-java">
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
		List&lt;BOESCSearchDetails&gt; lst= new ArrayList&lt;BOESCSearchDetails&gt;();
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

</code>
</pre>
</div>
</li>
</ol>
