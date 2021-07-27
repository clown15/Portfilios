package com.example.demo;

import java.sql.ResultSet;
import java.util.List;

import javax.sql.DataSource;

import org.springframework.jdbc.core.JdbcTemplate;

public class show_lecture {
	private JdbcTemplate jdbcTemplate;
	public show_lecture(DataSource dataSource) {
		// TODO Auto-generated constructor stub
		this.jdbcTemplate=new JdbcTemplate(dataSource);
	}
	public List<Lecture> select_lecture(String PRO_ID) {
		List<Lecture> results=jdbcTemplate.query("select * from lecture where PRO_ID="+PRO_ID,
				(ResultSet rs,int rowNum)-> {
					Lecture lecture=new Lecture(rs.getString("ID"), rs.getString("Name"), rs.getString("Dept"), rs.getString("Time"), rs.getString("PRO_ID"));
					return lecture;
				});
		return results;
	}
	public List<Lecture> select_all() {
		String sql="select l.ID,l.Name,l.Dept,l.Time,pro.Name from lecture l,professor pro where l.PRO_ID=pro.ID";
		List<Lecture> results=jdbcTemplate.query(sql,
				(ResultSet rs,int rowNum)-> {
					Lecture lecture=new Lecture(rs.getString("l.ID"), rs.getString("l.Name"), rs.getString("l.Dept"), rs.getString("l.Time"), rs.getString("pro.Name"));
					return lecture;
				});
		return results;
	}
	public int del_lecture(String id) {
		id=id.replace("/", "");
		String sql="delete from lecture where ID=?";
		System.out.println("del 실행:"+sql);
		try {
			int row=jdbcTemplate.update(sql,id);
			System.out.println("sql="+sql);
			System.out.println("row="+row);
			return row;
		}catch (Exception e) {
			// TODO: handle exception
			System.out.println(e);
			return -1;
		}
	}
}
