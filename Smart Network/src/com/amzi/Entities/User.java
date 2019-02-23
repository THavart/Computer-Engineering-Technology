package com.amzi.Entities;

import java.util.Date;

public class User {
	private int id;
	private String user_name;
	private String user_email;
	private String first_name;
	private String last_name;
	private Date date_created;
	private Date date_updated;
	private int user_type_id;
	private boolean user_changed_default_password;
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public String getUser_name() {
		return user_name;
	}
	public void setUser_name(String user_name) {
		this.user_name = user_name;
	}
	public String getUser_email() {
		return user_email;
	}
	public void setUser_email(String user_email) {
		this.user_email = user_email;
	}
	public String getFirst_name() {
		return first_name;
	}
	public void setFirst_name(String first_name) {
		this.first_name = first_name;
	}
	public String getLast_name() {
		return last_name;
	}
	public void setLast_name(String last_name) {
		this.last_name = last_name;
	}
	public Date getDate_created() {
		return date_created;
	}
	public void setDate_created(Date date_created) {
		this.date_created = date_created;
	}
	public Date getDate_updated() {
		return date_updated;
	}
	public void setDate_updated(Date date_updated) {
		this.date_updated = date_updated;
	}
	public int getUser_type_id() {
		return user_type_id;
	}
	public void setUser_type_id(int user_type_id) {
		this.user_type_id = user_type_id;
	}
	public boolean isUser_changed_default_password() {
		return user_changed_default_password;
	}
	public void setUser_changed_default_password(boolean user_changed_default_password) {
		this.user_changed_default_password = user_changed_default_password;
	}
	public String getFullName() {
		return this.first_name + " " + this.last_name;
	}
	
}
