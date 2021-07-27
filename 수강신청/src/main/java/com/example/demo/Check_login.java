<<<<<<< HEAD
package com.example.demo;

import java.sql.ResultSet;
import java.util.List;

import javax.sql.DataSource;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;

public class Check_login {
	private JdbcTemplate jdbcTemplate;
	@Autowired
	private Lock lock;
	public Check_login(DataSource dataSource) {
		this.jdbcTemplate=new JdbcTemplate(dataSource);
	}
	public List<Student> find(String id,String pw) {
		pw=lock.Lock_PW(pw);
		List<Student> results=jdbcTemplate.query("select * from student where id=\""+id+"\" and PW=\""+pw+"\"", 
				(ResultSet rs,int rowNum)-> {
					Student users=new Student(rs.getString("name"), rs.getString("PW"),rs.getInt("grade"), rs.getString("dept"),rs.getString("phone"));
					users.setId(rs.getString("ID"));
					return users;
				});
		if(results.isEmpty()) {
			results=jdbcTemplate.query("select * from professor where id=\""+id+"\" and PW=\""+pw+"\"", 
					(ResultSet rs,int rowNum)-> {
						Student users=new Student(rs.getString("name"), rs.getString("PW"),rs.getInt("grade"), rs.getString("dept"),rs.getString("phone"));
						users.setId(rs.getString("ID"));
						return users;
					});
		}
		if(results.isEmpty()) return null;
		return results;
	}
	
	public String search_id(String name,String phone) {
		String sql="select ID from student where name='"+name+"' and phone='"+phone+"'";
		String sql2="select ID from professor where name='"+name+"'and phone='"+phone+"'";
		
		try {
			List<String> results=jdbcTemplate.query(sql,
					(ResultSet rs,int rowNum)-> {
						String result=new String(rs.getString("ID"));
						return result;
					});
			return results.get(0);
		}catch (Exception e) {
			// TODO: handle exception
			try {
				List<String> results=jdbcTemplate.query(sql2,
						(ResultSet rs,int rowNum)-> {
							String result=new String(rs.getString("ID"));
							return result;
						});
				return results.get(0);
			}catch (Exception e2) {
				// TODO: handle exception
				return "false";
			}
		}
	}
	public String search_info(String id,String phone) {
		String sql="select ID from student where ID='"+id+"' and phone='"+phone+"'";
		String sql2="select ID from professor where ID='"+id+"'and phone='"+phone+"'";
		
		try {
			List<String> results=jdbcTemplate.query(sql,
					(ResultSet rs,int rowNum)-> {
						String result=new String(rs.getString("ID"));
						return result;
					});
			if(results.size()!=0)
				return "student";
			results=jdbcTemplate.query(sql2,
					(ResultSet rs,int rowNum)-> {
						String result=new String(rs.getString("ID"));
						return result;
					});
			if(results.size()!=0)
				return "professor";
			else return "false";
		}catch (Exception e) {
			// TODO: handle exception
			return "false";
		}
	}
	
	public int ch_pw(String id,String pw,String re) {
		String sql="update "+re+" set PW=? where ID=?";
		System.out.println(id);
		System.out.println(re);
		pw=lock.Lock_PW(pw);
		System.out.println(pw);
		try {
			int row=jdbcTemplate.update(sql,pw,id);
			return row;
		}catch (Exception e) {
			// TODO: handle exception
			System.out.println(e);
			return -1;
		}
	}
}
=======
package com.example.demo;

import java.sql.ResultSet;
import java.util.List;

import javax.sql.DataSource;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;

public class Check_login {
	private JdbcTemplate jdbcTemplate;
	@Autowired
	private Lock lock;
	public Check_login(DataSource dataSource) {
		this.jdbcTemplate=new JdbcTemplate(dataSource);
	}
	public List<Student> find(String id,String pw) {
		pw=lock.Lock_PW(pw);
		List<Student> results=jdbcTemplate.query("select * from student where id=\""+id+"\" and PW=\""+pw+"\"", 
				(ResultSet rs,int rowNum)-> {
					Student users=new Student(rs.getString("name"), rs.getString("PW"),rs.getInt("grade"), rs.getString("dept"),rs.getString("phone"));
					users.setId(rs.getString("ID"));
					return users;
				});
		if(results.isEmpty()) {
			results=jdbcTemplate.query("select * from professor where id=\""+id+"\" and PW=\""+pw+"\"", 
					(ResultSet rs,int rowNum)-> {
						Student users=new Student(rs.getString("name"), rs.getString("PW"),rs.getInt("grade"), rs.getString("dept"),rs.getString("phone"));
						users.setId(rs.getString("ID"));
						return users;
					});
		}
		if(results.isEmpty()) return null;
		return results;
	}
	
	public String search_id(String name,String phone) {
		String sql="select ID from student where name='"+name+"' and phone='"+phone+"'";
		String sql2="select ID from professor where name='"+name+"'and phone='"+phone+"'";
		
		try {
			List<String> results=jdbcTemplate.query(sql,
					(ResultSet rs,int rowNum)-> {
						String result=new String(rs.getString("ID"));
						return result;
					});
			return results.get(0);
		}catch (Exception e) {
			// TODO: handle exception
			try {
				List<String> results=jdbcTemplate.query(sql2,
						(ResultSet rs,int rowNum)-> {
							String result=new String(rs.getString("ID"));
							return result;
						});
				return results.get(0);
			}catch (Exception e2) {
				// TODO: handle exception
				return "false";
			}
		}
	}
	public String search_info(String id,String phone) {
		String sql="select ID from student where ID='"+id+"' and phone='"+phone+"'";
		String sql2="select ID from professor where ID='"+id+"'and phone='"+phone+"'";
		
		try {
			List<String> results=jdbcTemplate.query(sql,
					(ResultSet rs,int rowNum)-> {
						String result=new String(rs.getString("ID"));
						return result;
					});
			if(results.size()!=0)
				return "student";
			results=jdbcTemplate.query(sql2,
					(ResultSet rs,int rowNum)-> {
						String result=new String(rs.getString("ID"));
						return result;
					});
			if(results.size()!=0)
				return "professor";
			else return "false";
		}catch (Exception e) {
			// TODO: handle exception
			return "false";
		}
	}
	
	public int ch_pw(String id,String pw,String re) {
		String sql="update "+re+" set PW=? where ID=?";
		System.out.println(id);
		System.out.println(re);
		pw=lock.Lock_PW(pw);
		System.out.println(pw);
		try {
			int row=jdbcTemplate.update(sql,pw,id);
			return row;
		}catch (Exception e) {
			// TODO: handle exception
			System.out.println(e);
			return -1;
		}
	}
}
>>>>>>> master
