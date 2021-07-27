package com.example.demo;

import org.apache.tomcat.jdbc.pool.DataSource;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;

@Configuration
public class JavaConfig {
	@Bean(destroyMethod="close")
	public DataSource dataSource() {
		DataSource ds=new DataSource();
		ds.setDriverClassName("com.mysql.cj.jdbc.Driver");
		ds.setUrl("jdbc:mysql://localhost/term?characterEncoding=euckr&serverTimezone=UTC");
		ds.setUsername("Park");
		ds.setPassword("qwe123");
		ds.setInitialSize(2);
		ds.setMaxActive(20);
		ds.setTestWhileIdle(true);
		ds.setMinEvictableIdleTimeMillis(60000*3);
		ds.setTimeBetweenEvictionRunsMillis(10*1000);
		return ds;
	}
//	@Bean
//	public MemberDao memberDao() {
//		return new MemberDao(dataSource());
//	}
	@Bean
	public Check_login check() {
		return new Check_login(dataSource());
	}
	@Bean
	public ST_SignUp st_signup() {
		return new ST_SignUp(dataSource());
	}
	@Bean
	public PF_SignUp pf_signup() {
		return new PF_SignUp(dataSource());
	}
	@Bean
	public Lock lock() {
		return new Lock();
	}
	@Bean
	public show_lecture lecture() {
		return new show_lecture(dataSource());
	}
	@Bean
	public Calendar_list calendar() {
		return new Calendar_list(dataSource());
	}
	@Bean
	public Add_calendar add_cal() {
		return new Add_calendar(dataSource());
	}
	@Bean
	public Enrolment add_enrol() {
		return new Enrolment(dataSource());
	}
	@Bean
	public LectureDao lectureDao() {
		return new LectureDao(dataSource());
	}
}
