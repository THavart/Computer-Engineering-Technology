package com.amzi.DataAccess;

import com.mysql.jdbc.jdbc2.optional.MysqlDataSource;

public class DBUtil {
	private static MysqlDataSource dataSource = null;

	public static MysqlDataSource getDataSource() {
		if (dataSource == null) {
			dataSource = new MysqlDataSource();
			dataSource.setUser("root");
			dataSource.setPassword("");
			dataSource.setUrl("jdbc:mysql://localhost:3306/user_device_db");
		}
		
		return dataSource;
	}
}
