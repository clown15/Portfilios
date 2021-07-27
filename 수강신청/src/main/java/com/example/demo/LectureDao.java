package com.example.demo;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.List;

import javax.sql.DataSource;

import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.core.RowMapper;

public class LectureDao {
	private JdbcTemplate jdbcTemplate;
	public LectureDao(DataSource dataSource) {
		this.jdbcTemplate = new JdbcTemplate(dataSource);
	}
	public List<Lecture> selectAll() {
		List<Lecture> results = jdbcTemplate.query("select * from lecture"
				, new RowMapper<Lecture>() {
					@Override
					public Lecture mapRow(ResultSet rs, int rowNum) throws SQLException {
						Lecture lecture = new Lecture(rs.getString("ID")
														,rs.getString("Name")
														,rs.getString("Dept")
														,rs.getString("Time")
														,rs.getString("PRO_ID"));
							return lecture;
					}
				});
		return results;
	}
	
	public List<Lecture> select_list(String id) {
		String sql="select l.ID,l.Name,l.Dept,l.Time,l.PRO_ID from lecture l,enrol en where en.ST_ID='"+id+"' and en.L_ID=l.ID";
		List<Lecture> results = jdbcTemplate.query(sql
				, new RowMapper<Lecture>() {
					@Override
					public Lecture mapRow(ResultSet rs, int rowNum) throws SQLException {
						Lecture lecture = new Lecture(rs.getString("ID")
														,rs.getString("Name")
														,rs.getString("Dept")
														,rs.getString("Time")
														,rs.getString("PRO_ID"));
							return lecture;
					}
				});
		return results;
	}
	
	public int insert(String ID,String Name,String Dept,String Time,String PRO_ID) {

try {
			int row=jdbcTemplate.update("insert into lecture values(?,?,?,?,?)",ID,Name,Dept,Time,PRO_ID);
			return row;
		}catch (Exception e) {
			// TODO: handle exception
			return -1;
		}
	}
	public int insert_enrol(String id,String l_id,String time) {
		try {
			String sql="insert into enrol values(?,?,?)";
			int row=jdbcTemplate.update(sql,id,l_id,time);
			
			return row;
		}catch (Exception e) {
			// TODO: handle exception
			System.out.println("enrol error");
			System.out.println(e);
			return -1;
		}
	}
}