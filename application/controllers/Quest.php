<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quest extends CI_Controller {

	public function getSkill(){
		$skill = '{
			"1": {
				"name": "HTML/CSS",
				"numOfCourse": "12",
				"description": "Learn the fundamentals of design, front-end development, and crafting user experiences that are easy on the eyes.",
				"imgUri": "assets/image/badge-html-css.svg"
			},
			"2": {
				"name": "JavaScript",
				"numOfCourse": "17",
				"description": "Spend some time with this powerful scriptiong language and learn to build lightweight applications with enhanced user interfaces.",
				"imgUri": "assets/image/badge-javascript.svg"
			},
			"3": {
				"name": "Ruby",
				"numOfCourse": "8",
				"description": "Master your Ruby skills and increase your Rails street cred by learnng to build dynamic, sustainable application for the web.",
				"imgUri": "assets/image/badge-ruby.svg"
			},
			"4": {
				"name": "PHP",
				"numOfCourse": "4",
				"description": "Dig into one of the most prevalent programming languages and learn how PHP can help you develop various applications for the web.",
				"imgUri": "assets/image/badge-php.svg"
			},
			"5": {
				"name": "Python",
				"numOfCourse": "4",
				"description": "Explore what it means to strore and manipulate data, make decisions with your program, and leverage the power of Python.",
				"imgUri": "assets/image/badge-python.svg"
			},
			"6": {
				"name": "Git",
				"numOfCourse": "4",
				"description": "Build a solid foundation in Git, then pair it with advanced version control skills. Learn how to collaborate on projects effectively with Github.",
				"imgUri": "assets/image/badge-git.svg"
			},
			"7": {
				"name": "Database",
				"numOfCourse": "3",
				"description": "Take control of your application data layer by learning SQL, and take NoSQL, for a spin if you are feeling non-relation.",
				"imgUri": "assets/image/badge-database.svg"
			},
			"8": {
				"name": "Android",
				"numOfCourse": "3",
				"description": "Try building android applications for any android mobile devices. Learn the basics of android development and bring your app ideas to life.",
				"imgUri": "assets/image/badge-android.svg"
			}
		}';

		return $skill;
	}

	public function index(){
		$data['title'] = "Quest Courses";
		$data_skill = $this->getSkill();
		$data['skill_path'] = json_decode($data_skill);

		$this->template->load('base', 'main/quest', $data);
	}
}
