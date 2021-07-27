package com.example.demo;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.List;

import org.apache.tomcat.jdbc.pool.DataSource;
import org.springframework.jdbc.core.JdbcTemplate;

public class Calendar_list {
	private JdbcTemplate jdbcTemplate;
	public Calendar_list(DataSource dataSource) {
		// TODO Auto-generated constructor stub
		this.jdbcTemplate=new JdbcTemplate(dataSource);
	}
	public List<Calendar> select_list(String l_id) {
		l_id=l_id.replace("/", "");
		String sql="select l.Name,cal.Content,cal.Date,cal.L_ID from lecture l,calendar cal where cal.L_ID=l.ID and l.ID='"+l_id+"'"; 

		List<Calendar> results=jdbcTemplate.query(sql ,
			(ResultSet rs,int rowNum)-> {
				Calendar cal=new Calendar(rs.getString("l.Name"), rs.getString("cal.Content"), rs.getString("cal.Date"),rs.getString("cal.L_ID"));						
				return cal;
			});
			
		if(results.isEmpty()) {
			sql="select Name from lecture where ID='"+l_id+"'";
			results=jdbcTemplate.query(sql ,
					(ResultSet rs,int rowNum)-> {
						Calendar cal=new Calendar(rs.getString("Name"), null, null,null);						
						return cal;
					});
		}
		return results;
	}
	public int del_cal(String id,String date) {
		String sql="delete from calendar where Date=? and L_ID=?";
		id=id.replace("/", "");
		date=date.replace("/", "");
		System.out.println("sql="+sql);
		System.out.println(date);
		System.out.println(id);
		try {
			int row=jdbcTemplate.update(sql,date,id);
			System.out.println("row="+row);
			return row;
		}catch (Exception e) {
			System.out.println(e);
			// TODO: handle exception
			return -1;
		}
	}
}
