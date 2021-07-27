package com.example.demo;

import javax.sql.DataSource;

import org.springframework.jdbc.core.JdbcTemplate;

public class Add_calendar {
	private JdbcTemplate jdbcTemplate;
	public Add_calendar(DataSource dataSource) {
		this.jdbcTemplate=new JdbcTemplate(dataSource);
	}
	public int add(String l_id,String content,String date) {
		String sql="insert into calendar values(?,?,?)";
		l_id=l_id.replace("/", "");
		try {
			int row=jdbcTemplate.update(sql,date,content,l_id);		
			return row;
		}catch (Exception e) {
			// TODO: handle exception
			return -1;
		}
	}
}
