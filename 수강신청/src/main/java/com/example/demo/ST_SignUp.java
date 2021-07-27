package com.example.demo;

import javax.sql.DataSource;

import java.security.MessageDigest;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.format.datetime.DateFormatter;
import org.springframework.jdbc.core.JdbcTemplate;

public class ST_SignUp {
	private JdbcTemplate jdbcTemplate;
	@Autowired
	private Lock lock;
	public ST_SignUp(DataSource dataSource) {
		this.jdbcTemplate=new JdbcTemplate(dataSource);
	}
	public int insert(String id,String name,String pw,int grade,String dept,String phone) {
		try {
			pw=lock.Lock_PW(pw);
		
			int row=jdbcTemplate.update("insert into student values(?,?,?,?,?,?)",id,name,pw,grade,dept,phone);
			return row;
		}catch (Exception e) {
			// TODO: handle exception
			return -1;
		}
	}
}
