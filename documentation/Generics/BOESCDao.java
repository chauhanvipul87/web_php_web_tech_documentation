package com.iana.boesc;

import java.beans.BeanInfo;
import java.beans.IntrospectionException;
import java.beans.Introspector;
import java.beans.PropertyDescriptor;
import java.lang.reflect.InvocationTargetException;
import java.lang.reflect.Method;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.SQLException;
import java.sql.SQLXML;
import java.sql.Timestamp;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

class SimpleBean{

	public String getSize() {
		return size;
	}

	public void setSize(String size) {
		this.size = size;
	}

	public String getTotal() {
		return total;
	}
	
	public void setTotal(String total) {
		this.total = total;
	}

	public String getObj() {
		return obj;
	}

	public void setObj(String obj) {
		this.obj = obj;
	}

	public String getName() {
		return name;
	}
	
	public void setName(String name){
		this.name = name;
	}
	 
	
   @Override
	public String toString() {
		return "SimpleBean [name=" + name + ", size=" + size + ", total="
				+ total + ", obj=" + obj + "]";
	}



   private String name = "BOESC";
   private String size ;
   private String total;
   private String obj;
   
   public static  <T> Class<T> setBeansPojoValues(Class<T> type) {
	   try {
		   System.out.println("in setBeansPojoValues () ");
		   PropertyDescriptor[] props = getBeanInformation(type);
		   PropertyDescriptor prop = props[0];
		   T bean = type.newInstance();
		   setBeanValues(bean,prop,type);
		   
		} catch (Exception e) {
			e.printStackTrace();
		}
	   
	   
	return type;
	   
   }
   
   public void setPropertyValue(Object javaBean, String propertyName, Object propertyValue) {   
       try {  
           BeanInfo bi = Introspector.getBeanInfo(javaBean.getClass());  
           PropertyDescriptor pds[] = bi.getPropertyDescriptors();  
           for (PropertyDescriptor pd : pds) {  
               if (pd.getName().equals(propertyName)) {  
                   Method setter = pd.getWriteMethod();  
                   if (setter != null) {  
                       setter.invoke(javaBean, new Object[] {propertyValue} );  
                   }  
               }  
           }  
       } catch (Exception e) {  
           e.printStackTrace();  
       }  
   }  
   
   
   public static void main( String[] args ){
	   System.out.println("in main method ");
	   //setBeansPojoValues(SimpleBean.class);
	  // new SimpleBean().setPropertyValue(vo, "Hello", new String("ftpUserName"));
    }
	
   
   
   
   public static PropertyDescriptor[] getBeanInformation(Class<?> inputClass) throws IntrospectionException{
	   BeanInfo info =Introspector.getBeanInfo( inputClass, Object.class );
	   return info.getPropertyDescriptors();
   }
   
   public static <T> void setBeanValues(T target ,PropertyDescriptor prop,Class<T> type) {
	  try {
		  SimpleBean sim =  new SimpleBean();
		 sim.setName("Vipul");
		  sim.setSize("25");
		  sim.setTotal("150");
		  sim.setObj("in obj...");
		  
		  Method setter = prop.getWriteMethod();
		  System.out.println("setBeanValues () ::"+setter);
	       if (setter == null) {
	           return;
	       }
	       Class<?>[] params = setter.getParameterTypes();
	       System.out.println(params[0].getName());
	       setter.invoke(target, sim);
	       System.out.println(target);
	} catch (Exception e) {
		e.printStackTrace();
	}
       
   }
  
}


public class BOESCDao {
	
	
	
	public static void main(String[] args) {
			System.out.println(new BOESCDao(null));
	}
	
	
private static final Map<Class<?>, Object> primitiveDefaults = new HashMap<Class<?>, Object>();
    
	static {
        primitiveDefaults.put(Integer.TYPE, Integer.valueOf(0));
        primitiveDefaults.put(Short.TYPE, Short.valueOf((short) 0));
        primitiveDefaults.put(Byte.TYPE, Byte.valueOf((byte) 0));
        primitiveDefaults.put(Float.TYPE, Float.valueOf(0f));
        primitiveDefaults.put(Double.TYPE, Double.valueOf(0d));
        primitiveDefaults.put(Long.TYPE, Long.valueOf(0L));
        primitiveDefaults.put(Boolean.TYPE, Boolean.FALSE);
        primitiveDefaults.put(Character.TYPE, Character.valueOf((char) 0));
    }
	
	public <T> List<T> toBeanList(ResultSet rs, Class<T> type) throws SQLException {
        List<T> results = new ArrayList<T>();

        if (!rs.next()) {
            return results;
        }

        PropertyDescriptor[] props = this.propertyDescriptors(type);
        ResultSetMetaData rsmd = rs.getMetaData();
        int[] columnToProperty = this.mapColumnsToProperties(rsmd, props);

        do {
            results.add(this.createBean(rs, type, props, columnToProperty));
        } while (rs.next());

        return results;
    }
	
	 protected static final int PROPERTY_NOT_FOUND = -1;
	 private final Map<String, String> columnToPropertyOverrides;
	 
	 public BOESCDao(Map<String, String> columnToPropertyOverrides) {
	        super();
	        if (columnToPropertyOverrides == null) {
	            throw new IllegalArgumentException("columnToPropertyOverrides map cannot be null");
	        }
	        this.columnToPropertyOverrides = columnToPropertyOverrides;
	    }
	  
	 protected int[] mapColumnsToProperties(ResultSetMetaData rsmd,
	            PropertyDescriptor[] props) throws SQLException {

	        int cols = rsmd.getColumnCount();
	        int[] columnToProperty = new int[cols + 1];
	        Arrays.fill(columnToProperty, PROPERTY_NOT_FOUND);

	        for (int col = 1; col <= cols; col++) {
	            String columnName = rsmd.getColumnLabel(col);
	            if (null == columnName || 0 == columnName.length()) {
	              columnName = rsmd.getColumnName(col);
	            }
	            String propertyName = columnToPropertyOverrides.get(columnName);
	            if (propertyName == null) {
	                propertyName = columnName;
	            }
	            for (int i = 0; i < props.length; i++) {

	                if (propertyName.equalsIgnoreCase(props[i].getName())) {
	                    columnToProperty[col] = i;
	                    break;
	                }
	            }
	        }

	        return columnToProperty;
	    }
	
	 
	 
	  private PropertyDescriptor[] propertyDescriptors(Class<?> c)  throws SQLException {
		        // Introspector caches BeanInfo classes for better performance
		        BeanInfo beanInfo = null;
		        try {
		            beanInfo = Introspector.getBeanInfo(c);

		        } catch (IntrospectionException e) {
		            throw new SQLException(
		                "Bean introspection failed: " + e.getMessage());
		        }

		        return beanInfo.getPropertyDescriptors();
		    }
	  
	  private <T> T createBean(ResultSet rs, Class<T> type,
	            PropertyDescriptor[] props, int[] columnToProperty)
	            throws SQLException {

	        T bean = this.newInstance(type);

	        for (int i = 1; i < columnToProperty.length; i++) {

	            if (columnToProperty[i] == PROPERTY_NOT_FOUND) {
	                continue;
	            }

	            PropertyDescriptor prop = props[columnToProperty[i]];
	            Class<?> propType = prop.getPropertyType();

	            Object value = this.processColumn(rs, i, propType);

	            if (propType != null && value == null && propType.isPrimitive()) {
	                value = primitiveDefaults.get(propType);
	            }

	            this.callSetter(bean, prop, value);
	        }

	        return bean;
	    }
	  
	  
	    private void callSetter(Object target, PropertyDescriptor prop, Object value)
	            throws SQLException {

	        Method setter = prop.getWriteMethod();

	        if (setter == null) {
	            return;
	        }

	        Class<?>[] params = setter.getParameterTypes();
	        try {
	            // convert types for some popular ones
	            if (value instanceof java.util.Date) {
	                final String targetType = params[0].getName();
	                if ("java.sql.Date".equals(targetType)) {
	                    value = new java.sql.Date(((java.util.Date) value).getTime());
	                } else
	                if ("java.sql.Time".equals(targetType)) {
	                    value = new java.sql.Time(((java.util.Date) value).getTime());
	                } else
	                if ("java.sql.Timestamp".equals(targetType)) {
	                    value = new java.sql.Timestamp(((java.util.Date) value).getTime());
	                }
	            }

	            // Don't call setter if the value object isn't the right type
	            if (this.isCompatibleType(value, params[0])) {
	                setter.invoke(target, new Object[]{value});
	            } else {
	              throw new SQLException(
	                  "Cannot set " + prop.getName() + ": incompatible types, cannot convert "
	                  + value.getClass().getName() + " to " + params[0].getName());
	                  // value cannot be null here because isCompatibleType allows null
	            }

	        } catch (IllegalArgumentException e) {
	            throw new SQLException(
	                "Cannot set " + prop.getName() + ": " + e.getMessage());

	        } catch (IllegalAccessException e) {
	            throw new SQLException(
	                "Cannot set " + prop.getName() + ": " + e.getMessage());

	        } catch (InvocationTargetException e) {
	            throw new SQLException(
	                "Cannot set " + prop.getName() + ": " + e.getMessage());
	        }
	    }
	  
	  protected <T> T newInstance(Class<T> c) throws SQLException {
	        try {
	            return c.newInstance();

	        } catch (InstantiationException e) {
	            throw new SQLException(
	                "Cannot create " + c.getName() + ": " + e.getMessage());

	        } catch (IllegalAccessException e) {
	            throw new SQLException(
	                "Cannot create " + c.getName() + ": " + e.getMessage());
	        }
	    }
	  
	  
	 public static <T> T callMethod(String rs, Class<T> type) {
		 T bean  =null;
		 try {
			 bean =  type.newInstance();
			 
			
		} catch (InstantiationException e) {
			e.printStackTrace();
		} catch (IllegalAccessException e) {
			e.printStackTrace();
		}
		 
		return bean;
	 }
	 
	 protected Object processColumn(ResultSet rs, int index, Class<?> propType)
		        throws SQLException {

		        if ( !propType.isPrimitive() && rs.getObject(index) == null ) {
		            return null;
		        }

		        if (propType.equals(String.class)) {
		            return rs.getString(index);

		        } else if (
		            propType.equals(Integer.TYPE) || propType.equals(Integer.class)) {
		            return Integer.valueOf(rs.getInt(index));

		        } else if (
		            propType.equals(Boolean.TYPE) || propType.equals(Boolean.class)) {
		            return Boolean.valueOf(rs.getBoolean(index));

		        } else if (propType.equals(Long.TYPE) || propType.equals(Long.class)) {
		            return Long.valueOf(rs.getLong(index));

		        } else if (
		            propType.equals(Double.TYPE) || propType.equals(Double.class)) {
		            return Double.valueOf(rs.getDouble(index));

		        } else if (
		            propType.equals(Float.TYPE) || propType.equals(Float.class)) {
		            return Float.valueOf(rs.getFloat(index));

		        } else if (
		            propType.equals(Short.TYPE) || propType.equals(Short.class)) {
		            return Short.valueOf(rs.getShort(index));

		        } else if (propType.equals(Byte.TYPE) || propType.equals(Byte.class)) {
		            return Byte.valueOf(rs.getByte(index));

		        } else if (propType.equals(Timestamp.class)) {
		            return rs.getTimestamp(index);

		        } else if (propType.equals(SQLXML.class)) {
		            return rs.getSQLXML(index);

		        } else {
		            return rs.getObject(index);
		        }

		    }
	 
	    private boolean isCompatibleType(Object value, Class<?> type) {
	        // Do object check first, then primitives
	        if (value == null || type.isInstance(value)) {
	            return true;

	        } else if (type.equals(Integer.TYPE) && Integer.class.isInstance(value)) {
	            return true;

	        } else if (type.equals(Long.TYPE) && Long.class.isInstance(value)) {
	            return true;

	        } else if (type.equals(Double.TYPE) && Double.class.isInstance(value)) {
	            return true;

	        } else if (type.equals(Float.TYPE) && Float.class.isInstance(value)) {
	            return true;

	        } else if (type.equals(Short.TYPE) && Short.class.isInstance(value)) {
	            return true;

	        } else if (type.equals(Byte.TYPE) && Byte.class.isInstance(value)) {
	            return true;

	        } else if (type.equals(Character.TYPE) && Character.class.isInstance(value)) {
	            return true;

	        } else if (type.equals(Boolean.TYPE) && Boolean.class.isInstance(value)) {
	            return true;

	        }
	        return false;

	    }

	    
	    
	    
}
