package com.amzi.Entities;

import java.util.Date;

public class Ticket {
	private int id;
	private int userId;
	private String summary;
	private String subject;
	private String description;
	private Date date_created;
	private Date date_updated;
	private int ticket_status_id;	
	private int urgentLevel;
	private String adminRemark;
	
	public String getAdminRemark() {
		return adminRemark;
	}
	public void setAdminRemark(String adminRemark) {
		this.adminRemark = adminRemark;
	}
	public int getId() {
		return id;
	}
	public void setId(int id) {
		this.id = id;
	}
	public int getUserId() {
		return userId;
	}
	public void setUserId(int userId) {
		this.userId = userId;
	}
	public String getSummary() {
		return summary;
	}
	public void setSummary(String summary) {
		this.summary = summary;
	}
	public String getSubject() {
		return subject;
	}
	public void setSubject(String subject) {
		this.subject = subject;
	}
	public String getDescription() {
		return description;
	}
	public void setDescription(String description) {
		this.description = description;
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
	public int getTicket_status_id() {
		return ticket_status_id;
	}
	public void setTicket_status_id(int ticket_status_id) {
		this.ticket_status_id = ticket_status_id;
	}
	public int getUrgentLevel() {
		return urgentLevel;
	}
	public void setUrgentLevel(int urgentLevel) {
		this.urgentLevel = urgentLevel;
	}
	
}
