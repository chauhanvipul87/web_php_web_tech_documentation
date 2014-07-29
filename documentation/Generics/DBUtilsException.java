package com.iana.boesc;

class DBUtilsException extends Exception{
	
private static final long serialVersionUID = 1L;
	
	private String message = null;
	 
    public DBUtilsException() {
        super();
    }
 
    public DBUtilsException(String message) {
        super(message);
        this.message = message;
    }
 
    public DBUtilsException(Throwable cause) {
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