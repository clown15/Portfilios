package com.example.demo;

public class Lecture {
	private String ID;
	private String Name;
	private String Dept;
	private String Time;
	private String Pro_id;
	
	public Lecture(String ID,String Name,String Dept,String Time,String Pro_id) {
		this.ID=ID;
		this.Name=Name;
		this.Dept=Dept;
		this.Time=Time;
		this.Pro_id=Pro_id;
	}
	public String getID() {
		return ID;
	}
	public void setID(String iD) {
		ID = iD;
	}
	public String getName() {
		return Name;
	}
	public void setName(String name) {
		Name = name;
	}
	public String getDept() {
		return Dept;
	}
	public void setDept(String dept) {
		Dept = dept;
	}
	public String getTime() {
		return Time;
	}
	public void setTime(String time) {
		Time = time;
	}
	public String getPro_id() {
		return Pro_id;
	}
	public void setPro_id(String pro_id) {
		Pro_id = pro_id;
	}
}
