<<<<<<< HEAD
package com.example.demo;

import java.sql.ResultSet;
import java.util.List;

import org.apache.tomcat.jdbc.pool.DataSource;
import org.springframework.jdbc.core.JdbcTemplate;

public class Enrolment {
	private JdbcTemplate jdbcTemplate;
	public Enrolment(DataSource dataSource) {
		this.jdbcTemplate=new JdbcTemplate(dataSource);
	}
	public int add_enrol(String st_id,String l_id,String time) {
		String sql="insert into enrol values(?,?,?)";
		l_id=l_id.replace("/", "");
		time=time.replace("/", "");
		System.out.println("st_id="+st_id+" l_id="+l_id+" time="+time);
		try {
			int row=jdbcTemplate.update(sql,st_id,l_id,time);
			return row;
		}catch(Exception e) {
			return -1;
		}
	}
	public List<Lecture> select_all(String st_id) {
		String sql="select l.ID,l.Name,l.Dept,l.Time,pro.Name from lecture l,professor pro,enrol en where en.ST_ID='"+st_id+"' and (en.L_ID=l.ID and l.PRO_ID=pro.ID)";
		
		List<Lecture> results=jdbcTemplate.query(sql, 
				(ResultSet rs,int rowNum)-> {
					Lecture lecture=new Lecture(rs.getString("l.ID"), rs.getString("l.Name"), rs.getString("l.Dept"), rs.getString("l.Time"), rs.getString("pro.Name"));
					return lecture;
				});
		return results;
	}
	public int del_enrol(String st_id,String l_id) {
		l_id=l_id.replace("/", "");
		String sql="delete from enrol where ST_ID=? and L_ID=?";
		
		try {
			int row=jdbcTemplate.update(sql,st_id,l_id);
			return row;
		}catch(Exception e) {
			return -1;
		}
	}
}
=======
package com.example.demo;

import java.sql.ResultSet;
import java.util.List;

import org.apache.tomcat.jdbc.pool.DataSource;
import org.springframework.jdbc.core.JdbcTemplate;

public class Enrolment {
	private JdbcTemplate jdbcTemplate;
	public Enrolment(DataSource dataSource) {
		this.jdbcTemplate=new JdbcTemplate(dataSource);
	}
	public int add_enrol(String st_id,String l_id,String time) {
		String sql="insert into enrol values(?,?,?)";
		l_id=l_id.replace("/", "");
		time=time.replace("/", "");
		System.out.println("st_id="+st_id+" l_id="+l_id+" time="+time);
		try {
			int row=jdbcTemplate.update(sql,st_id,l_id,time);
			return row;
		}catch(Exception e) {
			return -1;
		}
	}
	public List<Lecture> select_all(String st_id) {
		String sql="select l.ID,l.Name,l.Dept,l.Time,pro.Name from lecture l,professor pro,enrol en where en.ST_ID='"+st_id+"' and (en.L_ID=l.ID and l.PRO_ID=pro.ID)";
		
		List<Lecture> results=jdbcTemplate.query(sql, 
				(ResultSet rs,int rowNum)-> {
					Lecture lecture=new Lecture(rs.getString("l.ID"), rs.getString("l.Name"), rs.getString("l.Dept"), rs.getString("l.Time"), rs.getString("pro.Name"));
					return lecture;
				});
		return results;
	}
	public int del_enrol(String st_id,String l_id) {
		l_id=l_id.replace("/", "");
		String sql="delete from enrol where ST_ID=? and L_ID=?";
		
		try {
			int row=jdbcTemplate.update(sql,st_id,l_id);
			return row;
		}catch(Exception e) {
			return -1;
		}
	}
}
>>>>>>> master
