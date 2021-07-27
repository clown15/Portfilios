package com.example.demo;

import java.security.MessageDigest;
import java.text.SimpleDateFormat;
import java.util.Date;

import javax.sql.DataSource;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;

public class PF_SignUp {
	private JdbcTemplate jdbcTemplate;
	@Autowired
	private Lock lock;
	public PF_SignUp(DataSource dataSource) {
		this.jdbcTemplate=new JdbcTemplate(dataSource);
	}
	public int insert(String id,String name,String pw,String dept,String phone) {
		pw=lock.Lock_PW(pw);
		try {
			int row=jdbcTemplate.update("insert into professor values(?,?,?,?,?,?)",id,name,pw,0,dept,phone);
			return row;
		}catch (Exception e) {
			// TODO: handle exception
			return -1;
		}
	}
	
}
