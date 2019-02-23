using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Lab4.Models;
using System.Data.SqlClient;
using Microsoft.AspNetCore.Http;


// For more information on enabling MVC for empty projects, visit http://go.microsoft.com/fwlink/?LinkID=397860

namespace Lab4.Controllers
{
    public class Home : Controller
    {

        private Assignment1DataContext _movieContext;

        public Home(Assignment1DataContext context)
        {
            _movieContext = context;
        }

        /// <summary>
        /// 
        /// </summary>
        /// <returns></returns>
        public IActionResult Index()
        {
            return View(_movieContext.BlogPosts.ToList());
        }

        /// <summary>movie
        /// 
        /// </summary>
        /// <returns></returns>
        /// 
        public IActionResult AddBlogPost()
        {
            return View();
        }
        public IActionResult UserLogin()
        {
            return View();
        }
        public IActionResult AddUser()
        {
            return View();
        }

        public IActionResult LoginUser(User user)
        {
            string EmailAddress = HttpContext.Session.GetString("EmailAddress");
            string Password = HttpContext.Session.GetString("Password");
            using (SqlCommand cmd = new SqlCommand("select count(*) from Users where [EmailAddress]=@EmailAddress and [Password]=@Password COLLATE SQL_Latin1_General_CP1_CS_AS ",new SqlConnection(@"Server=localhost\SQLEXPRESS;Database=Assignment1;Trusted_Connection=True;MultipleActiveResultSets=true;")))
            {
                cmd.Parameters.AddWithValue("@EmailAddress",EmailAddress);
                cmd.Parameters.AddWithValue("@Password",Password);
                cmd.Connection.Open();
                if((int)cmd.ExecuteScalar()>0)
                {
                    return RedirectToAction("Index");
                }
                else
                {
                    return RedirectToAction("Index");
                }
            }     
        }

        /// <summary>
        /// 
        /// </summary>
        /// <returns></returns>
        ///
        public IActionResult CreateBlogPost(BlogPost movie)
        {
            _movieContext.BlogPosts.Add(movie);
            _movieContext.SaveChanges();

            return RedirectToAction("Index");
        }
        public IActionResult CreateUser(User movie)
        {
            _movieContext.Users.Add(movie);
            _movieContext.SaveChanges();

            return RedirectToAction("Index");
        }

        /// <summary>
        /// 
        /// </summary>
        /// <returns></returns>
        /// 
        public IActionResult EditMovie(int id)
        {
            var movieToUpdate = (from m in _movieContext.BlogPosts where m.BlogPostId == id select m).FirstOrDefault();

            return View(movieToUpdate);
        }

        /// <summary>
        /// 
        /// </summary>
        /// <returns></returns>
        /// 
        public IActionResult ModifyMovie(BlogPost movie)
        {
            var id = Convert.ToInt32(Request.Form["BlogPostId"]);

            var movieToUpdate = (from m in _movieContext.BlogPosts where m.BlogPostId == id select m).FirstOrDefault();

            movieToUpdate.Title =   movie.Title;
            movieToUpdate.Content = movie.Content;
            movieToUpdate.Posted = movie.Posted;
            _movieContext.SaveChanges();

            return RedirectToAction("Index");
        }
    }
}
