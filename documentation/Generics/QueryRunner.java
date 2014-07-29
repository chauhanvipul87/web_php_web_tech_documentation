package com.iana.boesc;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

public class QueryRunner extends AbstractQueryRunner  {
	
	Connection conn =null;
	public QueryRunner(Connection conn){
		this.conn = conn;
	}

	private Connection getConnection() throws DBUtilsException{
		if(this.conn == null ) throw new DBUtilsException("Do not extablish the connection"); 
		return this.conn;
	}
	
	public int save(String sql ,Object[] params) throws DBUtilsException,SQLException{
		Connection conn = this.getConnection();
		 if (sql == null) {
	            close(conn);
	        }
		PreparedStatement stmt = null;
        int rows = 0;

        try {
            stmt = this.prepareStatement(conn, sql);
            this.fillStatement(stmt, params);
            rows = stmt.executeUpdate();

        } catch (SQLException e) {
            this.rethrow(e, sql, params);

        } finally {
            close(stmt);
                close(conn);
        }
        return rows;
	}
	
	
	public int saveBean(String sql ,Object bean) throws DBUtilsException,SQLException{
		Connection conn = this.getConnection();
		 if (sql == null) {
	            close(conn);
	        }
		PreparedStatement stmt = null;
        int rows = 0;

        try {
            stmt = this.prepareStatement(conn, sql);
            this.fillStatementWithBean(stmt, bean,this.getPropertyDescriptor(bean));
            rows = stmt.executeUpdate();

        } catch (SQLException e) {
        	e.printStackTrace();
            //this.rethrow(e, sql, params);

        } finally {
            close(stmt);
                close(conn);
        }
        return rows;
	}
	

}
