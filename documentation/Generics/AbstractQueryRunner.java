package com.iana.boesc;

import java.beans.BeanInfo;
import java.beans.IntrospectionException;
import java.beans.Introspector;
import java.beans.PropertyDescriptor;
import java.lang.reflect.InvocationTargetException;
import java.lang.reflect.Method;
import java.sql.Connection;
import java.sql.ParameterMetaData;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.Arrays;

public abstract class AbstractQueryRunner {
	
	protected void close(Connection conn) throws DBUtilsException {
        try {
			conn.close();
		} catch (SQLException e) {
			throw new DBUtilsException("Unable to close connection."+e.getMessage());
		}
    }
	
	protected PropertyDescriptor[] getPropertyDescriptor(Object javaBean){
        BeanInfo bi =null;
		try {
			bi = Introspector.getBeanInfo(javaBean.getClass());
		} catch (IntrospectionException e) {
			e.printStackTrace();
		}  
        PropertyDescriptor pds[] = bi.getPropertyDescriptors();
		return pds; 
	}

	 protected void close(Statement stmt) throws DBUtilsException {
		 try {
			 stmt.close();
		 }catch (SQLException e) {
				throw new DBUtilsException("Unable to close statement."+e.getMessage());
			}
	  }
	 
	 protected void rethrow(SQLException cause, String sql, Object... params)   throws SQLException {

			        String causeMessage = cause.getMessage();
			        if (causeMessage == null) {
			            causeMessage = "";
			        }
			        StringBuffer msg = new StringBuffer(causeMessage);

			        msg.append(" Query: ");
			        msg.append(sql);
			        msg.append(" Parameters: ");

			        if (params == null) {
			            msg.append("[]");
			        } else {
			            msg.append(Arrays.deepToString(params));
			        }

			        SQLException e = new SQLException(msg.toString(), cause.getSQLState(),cause.getErrorCode());
			        e.setNextException(cause);

			        throw e;
			    }

	 
	protected PreparedStatement prepareStatement(Connection conn, String sql) throws SQLException {
		 return conn.prepareStatement(sql);
	}
	
	public void fillStatement(PreparedStatement stmt, Object... params) throws SQLException {

			        // check the parameter count, if we can
			        ParameterMetaData pmd = null;
		            pmd = stmt.getParameterMetaData();
		            int stmtCount = pmd.getParameterCount();
		            int paramsCount = params == null ? 0 : params.length;

		            if (stmtCount != paramsCount) {
		                throw new SQLException("Wrong number of parameters: expected "
		                        + stmtCount + ", was given " + paramsCount);
		            }
			        // nothing to do here
			        if (params == null) {
			            return;
			        }

			        for (int i = 0; i < params.length; i++) {
			            if (params[i] != null) {
			                stmt.setObject(i + 1, params[i]);
			            } 
			        }
	}
	
    public void fillStatementWithBean(PreparedStatement stmt, Object bean,PropertyDescriptor[] properties) throws SQLException {
        Object[] params = new Object[properties.length];
        for (int i = 0; i < properties.length; i++) {
            PropertyDescriptor property = properties[i];
            Object value = null;
            Method method = property.getReadMethod();
            if (method == null) {
                throw new RuntimeException("No read method for bean property "
                        + bean.getClass() + " " + property.getName());
            }
            try {
                value = method.invoke(bean, new Object[0]);
            } catch (InvocationTargetException e) {
                throw new RuntimeException("Couldn't invoke method: " + method,
                        e);
            } catch (IllegalArgumentException e) {
                throw new RuntimeException(
                        "Couldn't invoke method with 0 arguments: " + method, e);
            } catch (IllegalAccessException e) {
                throw new RuntimeException("Couldn't invoke method: " + method,
                        e);
            }
            params[i] = value;
        }
        fillStatement(stmt, params);
    }
	
}
