package com.example.demo;

public class Calendar {
	private String content;
	private String date;
	private String l_id;
	private String name;
	
	public Calendar(String name,String content,String date,String l_id) {
		this.content=content;
		this.date=date;
		this.name=name;
		this.l_id=l_id;
	}
	public String getContent() {
		return content;
	}
	public void setContent(String content) {
		this.content = content;
	}
	public String getDate() {
		return date;
	}
	public void setDate(String date) {
		this.date = date;
	}
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public String getL_id() {
		return l_id;
	}
	public void setL_id(String l_id) {
		this.l_id = l_id;
	}
}
