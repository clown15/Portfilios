package com.example.demo;

import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class MainController {
	@Autowired
	private Check_login check;
	@Autowired
	private ST_SignUp st_signup;
	@Autowired
	private PF_SignUp pf_signup;
	@Autowired
	private show_lecture lecture;
	@Autowired
	private Calendar_list calendar; 
	@Autowired 
	private Add_calendar add_cal;
	@Autowired
	private Enrolment enrol;
	@Autowired
	private LectureDao lectureDao;
	
	@RequestMapping(value="/",method=RequestMethod.GET)
	public String index(HttpSession session) {
		session.invalidate();
		return "index";
	}
	@PostMapping(value="/")
	public String post_index(Model model,
			@RequestParam(value="name",required=false,defaultValue="null") String name,
			@RequestParam(value="phone") String phone,
			@RequestParam(value="id",required=false,defaultValue="null") String id) {
		if(id.equals("null")) {
			String s_id=check.search_id(name,phone);
			if(s_id.equals("false")) model.addAttribute("id", -1);
			else model.addAttribute("id", s_id);
			System.out.println(s_id);
		}
		else if(name.equals("null")) {
			String result=check.search_info(id, phone);
			if(result.equals("false")) model.addAttribute("result", result);
			else {
				model.addAttribute("result", result);
				model.addAttribute("id", id);
			}
			return "s_pw";
		}
		return "index";
	}
	@RequestMapping(value="/logincheck",method=RequestMethod.POST)
	public String logincheck(Model model,
		@RequestParam(value="id") String id,@RequestParam(value="pw") String pw,
		HttpSession session) {
		List<Student> member = check.find(id,pw);
		if(member!=null) {
			session.setAttribute("ID", member.get(0).getId());
			session.setAttribute("Name", member.get(0).getName());
			session.setAttribute("Grade", member.get(0).getGrade());
			session.setAttribute("Dept", member.get(0).getDept());
			session.setAttribute("Phone", member.get(0).getPhone());
			model.addAttribute("result",true);
			return "logincheck";
		}
		model.addAttribute("result", false);
		return "logincheck";
	}
	@RequestMapping(value="/ST_SignUp",method=RequestMethod.GET)
	public String ST_SignUp(Model model) {
		return "ST_SignUp";
	}
	@RequestMapping(value="/ST_SignUp",method=RequestMethod.POST)
	public String Post_ST_SignUp(Model model,
			@RequestParam(value="id") String id,@RequestParam(value="name") String name,
			@RequestParam(value="pw") String pw,@RequestParam(value="grade") int grade,
			@RequestParam(value="dept") String dept,@RequestParam(value="phone") String phone) {
		int row=st_signup.insert(id, name, pw, grade, dept, phone);
		model.addAttribute("result",row);
//		Date date=new Date();
//		java.sql.Timestamp sqlTime=new java.sql.Timestamp(date.getTime());
//		model.addAttribute("result",sqlTime);
		return "ST_SignUp";
	}
	@GetMapping("/PF_SignUp")
	public String PF_SignUp(Model model) {
		return "PF_SignUp";
	}
	@PostMapping("/PF_SignUp")
	public String Post_PF_SignUp(Model model,
			@RequestParam(value="id") String id,@RequestParam(value="name") String name,
			@RequestParam(value="pw") String pw,@RequestParam(value="dept") String dept,
			@RequestParam(value="phone") String phone) {
		int row=pf_signup.insert(id, name, pw, dept, phone);
		model.addAttribute("result", row);
		return "PF_SignUp";
	}
	@RequestMapping("/main") 
	public String main(Model model,HttpSession session) {
		try {
			String id=(String)session.getAttribute("ID");
			if(id==null) return "index";
			String name=(String)session.getAttribute("Name");
			String dept=(String)session.getAttribute("Dept");
			int grade=(int)session.getAttribute("Grade");
			String phone=(String)session.getAttribute("Phone");
			
			List info = new ArrayList();
			info.add(id);
			info.add(name);
			info.add(dept);
			info.add(grade);
			info.add(phone);
			
			System.out.println("grade="+grade);
			
			model.addAttribute("info", info);
			model.addAttribute("grade", grade);
			return "main";
		}catch(Exception e) {
			System.out.println(e);
		}
		return "main";
	}
	@GetMapping("/lecture_list")
	public String l_list(Model model,HttpSession session) {
		String id=(String)session.getAttribute("ID");
		int grade=(int)session.getAttribute("Grade");
		
		if(id==null) return "index";
		List<Lecture> list=lecture.select_lecture(id);
		System.out.println("list="+list);
		model.addAttribute("lecture", list);
		model.addAttribute("grade", grade);
		return "lecture_list";
	}
	@PostMapping("/lecture_list")
	public String post_l_list(Model model,HttpSession session,
			@RequestParam(value="l_id") String l_id) {
		String id=(String)session.getAttribute("ID");
		if(id==null) return "index";
		int row=lecture.del_lecture(l_id);
		List<Lecture> list=lecture.select_lecture(id);
		if(row>0)
			model.addAttribute("result", true);
		else
			model.addAttribute("result", false);
		model.addAttribute("lecture", list);
		return "lecture_list";
	}
	@GetMapping("/calendar")
	public String get_calendar(Model model,HttpSession session,
			//과목id
			@RequestParam(value="l_id") String l_id) {
		int grade=-1;
		try {
			grade=(int)session.getAttribute("Grade");
		}catch (Exception e) {
			// TODO: handle exception
		}
		
		List<Calendar> list=calendar.select_list(l_id);
		model.addAttribute("grade", grade);
		model.addAttribute("l_id", l_id);
		model.addAttribute("list", list);
		return "calendar";
	}
	@PostMapping("/calendar")
	public String calendar(Model model,HttpSession session,
			@RequestParam(value="date") String date,@RequestParam(value="content") String content,
			@RequestParam(value="l_id") String l_id) {
		int grade=-1;
		try {
			grade=(int)session.getAttribute("Grade");
		}catch (Exception e) {
			// TODO: handle exception
		}
		System.out.println(l_id);
		System.out.println("날짜:"+date);
		int row=add_cal.add(l_id, content, date);
		List<Calendar> list=calendar.select_list(l_id);
		System.out.println(row);
		model.addAttribute("grade", grade);
		model.addAttribute("l_id", l_id);
		model.addAttribute("row", row);
		model.addAttribute("list", list);
		return "calendar";
	}
	@GetMapping(value="info_lecture")
	public String info_l(Model model,
			@RequestParam(value="l_id") String l_id) {
		List<Calendar> list=calendar.select_list(l_id);
		model.addAttribute("list", list);
		return "info_lecture";
	}
	@GetMapping("/enrol")
	public String enrol(Model model) {
		List<Lecture> list=lecture.select_all();
		model.addAttribute("lecture", list);
		return "enrol";
	}
	@PostMapping("/enrol")
	public String add_enrol(Model model,HttpSession session,
			@RequestParam(value="l_id") String l_id,@RequestParam(value="time") String time) {
		String id=(String)session.getAttribute("ID");
		//if(id==null) return "index";
		int row=enrol.add_enrol(id, l_id, time);
		if(row>0) model.addAttribute("result", true);
		else model.addAttribute("result", false);
		List<Lecture> list=lecture.select_all();
		model.addAttribute("lecture", list);
		return "enrol";
	}
	@GetMapping("/enrol_list")
	public String enrol_list(Model model,HttpSession session) {
		String id=(String)session.getAttribute("ID");
		List<Lecture> list=enrol.select_all(id);
		model.addAttribute("lecture", list);
		
		return "enrol_list";
	}
	@PostMapping("/enrol_list")
	public String del_enrol_list(Model model,HttpSession session,
			@RequestParam(value="l_id") String l_id)  {
		String id=(String)session.getAttribute("ID");
		int row=enrol.del_enrol(id,l_id);
		List<Lecture> list=enrol.select_all(id);
		model.addAttribute("lecture", list);
		return "enrol_list";
	}
	@PostMapping("/del_cal")
	public String del_cal(Model model,HttpSession session,
			@RequestParam(value="date") String date,@RequestParam(value="l_id") String l_id) {
		String id=(String)session.getAttribute("ID");
		int row=calendar.del_cal(l_id,date);
		
		if(row>0) model.addAttribute("result", true);
		else model.addAttribute("result", false);
		model.addAttribute("l_id", l_id);
		return "del_cal";
	}
	@RequestMapping(value="/form")
	public String form(Model model,HttpSession session) {
		String id=(String)session.getAttribute("ID");
		int grade=(int)session.getAttribute("Grade");
		
		List<Lecture> lectures = lectureDao.selectAll();
		model.addAttribute("PRO_ID", id);
		model.addAttribute("lectures", lectures);
		model.addAttribute("grade", grade);
		if(lectures!=null)
			System.out.println(lectures.get(0).getName());
		return "form";
	}
	
	@RequestMapping(value="/formcheck")
	public String formcheck(Model model, HttpServletRequest request, HttpSession session) {
		//request.setAttribute("session", PRO_ID);
		/*String name = (String)request.getParameter("name");
		System.out.println("name = " + name);
		List<Course> courses = courseDao.selectAll();
		model.addAttribute("courses", courses);*/
		System.out.println("PRO_ID="+session.getAttribute("PRO_ID"));
		String ID = (String)request.getParameter("ID");
		String Name = (String)request.getParameter("Name");
		String Dept = (String)request.getParameter("Dept");
		String Time = (String)request.getParameter("Time");
		String PRO_ID = (String)request.getParameter("PRO_ID");
		
		int res=lectureDao.insert(ID, Name, Dept, Time, PRO_ID);
		if(res>0) {
			lectureDao.insert_enrol(PRO_ID, ID, Time);
		}
		model.addAttribute("res", res);
		System.out.println(res);
		
		
		List<Lecture> lectures = lectureDao.selectAll();
		model.addAttribute("lectures", lectures);
		for(int i=0;i<lectures.size();i++)
			
		System.out.println(lectures.get(i).getName());
		return "table";
	}
	
	@RequestMapping(value="/test")
	public String test(Model model, HttpServletRequest request) {
		return "test";
	}
	
	@RequestMapping(value="/table")
	public String table(Model model, HttpSession session) {
		String id=(String)session.getAttribute("ID");
		int grade=(int)session.getAttribute("Grade");
		
		List<Lecture> lectures = lectureDao.select_list(id);
		model.addAttribute("lectures", lectures);
		model.addAttribute("grade", grade);
		return "table";
	}
	
	@RequestMapping(value="/s_id")
	public String s_id(Model model) {
		return "s_id";
	}
	@RequestMapping(value="/s_pw",method=RequestMethod.GET) 
	public String s_pw(Model model) {
		
		return "s_pw";
	}
	@PostMapping(value="/s_pw")
	public String ch_pw(Model model,
			@RequestParam(value="pw") String pw,@RequestParam(value="result") String re,
			@RequestParam(value="id") String id) {
		int rs=check.ch_pw(id, pw, re);
		if(rs==1) model.addAttribute("ch_pw", rs);
		return "index";
	}
}
