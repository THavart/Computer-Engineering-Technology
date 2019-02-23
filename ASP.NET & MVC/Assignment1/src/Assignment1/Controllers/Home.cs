using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Assignment1.Models;
using Microsoft.AspNetCore.Http;
using Newtonsoft.Json;

// For more information on enabling MVC for empty projects, visit http://go.microsoft.com/fwlink/?LinkID=397860

namespace Assignment1.Controllers
{

    public class Home : Controller
    {
        private Assignment1DataContext _Assignment1DataContext;
        // GET: /<controller>/


        public Home(Assignment1DataContext context)
        {
            _Assignment1DataContext = context;
        }
        public IActionResult Index()
        {
            User user = null;
            var jUser = HttpContext.Session.GetString("user");
            if (jUser != null)
            {
                user = JsonConvert.DeserializeObject<User>(jUser);
                ViewData["UserId"] = user.UserId;
                ViewData["FirstName"] = user.FirstName;
                ViewData["LastName"] = user.LastName;
                if (user.RoleId == 2)
                    ViewData["RoleId"] = user.RoleId;
            }
            else
            {
                ViewData["UserId"] = null;
            }
            return View(_Assignment1DataContext.BlogPosts.ToList());
        }
        public IActionResult RegisterUser(User user)
        {

            _Assignment1DataContext.Users.Add(user);
            _Assignment1DataContext.SaveChanges();
            return RedirectToAction("Login");
        }
        public IActionResult Register()
        {

            return View();
        }
        public IActionResult Authenticate()
        {
            var email = HttpContext.Request.Form["Email"];
            var password = HttpContext.Request.Form["password"];
            var user = (from u in _Assignment1DataContext.Users where u.EmailAddress == email select u).FirstOrDefault();

            if (user != null)
            {
                if (user.Password == password)
                {
                    var jUser = JsonConvert.SerializeObject(user);
                    HttpContext.Session.SetString("user", jUser);
                    HttpContext.Session.SetInt32("role", user.RoleId);

                    return RedirectToAction("Index");
                }
                else
                {
                    return RedirectToAction("Login");
                }
            }
            else
            {
                return RedirectToAction("Register");
            }
        }
        public IActionResult Login()
        {
            return View();
        }

        public IActionResult Dethenticate()
        {
            return RedirectToAction("Index");
        }
        public IActionResult Logout()
        {
            HttpContext.Session.Clear();
            return View();
            return RedirectToAction("Index");
        }

        public IActionResult AddBlogPost()
        {
            User user = null;
            var jUser = HttpContext.Session.GetString("user");
            if (jUser != null)
            {
                user = JsonConvert.DeserializeObject<User>(jUser);
                ViewData["UserId"] = user.UserId;

                ViewData["FirstName"] = user.FirstName;
                ViewData["LastName"] = user.LastName;
                if (user.RoleId == 2)
                    ViewData["RoleId"] = user.RoleId;
            }
            else
            {
                ViewData["UserId"] = null;
            }
            return View();
        }
        public IActionResult AddPost(BlogPost Post)
        {
            _Assignment1DataContext.BlogPosts.Add(Post);
            _Assignment1DataContext.SaveChanges();

            return RedirectToAction("Index");
        }
        public IActionResult DisplayFullBlogPost(int id)
        {
            User user = null;
            var jUser = HttpContext.Session.GetString("user");
            if (jUser != null)
            {
                user = JsonConvert.DeserializeObject<User>(jUser);
                ViewData["UserId"] = user.UserId;
                ViewData["FirstName"] = user.FirstName;
                ViewData["LastName"] = user.LastName;
                if (user.RoleId == 2)
                    ViewData["RoleId"] = user.RoleId;
            }
            else
            {
                ViewData["UserId"] = null;
            }

            var Blog = (from b in _Assignment1DataContext.BlogPosts where b.BlogPostId == id select b).FirstOrDefault();
            var Poster = (from u in _Assignment1DataContext.Users where u.UserId == Blog.UserId select u).FirstOrDefault();
            ViewData["PosterEmail"] = Poster.EmailAddress;
            ViewData["PosterFirstName"] = Poster.FirstName;
            ViewData["PosterFirstName"] = Poster.LastName;
            ViewData["comments"] = (from c in _Assignment1DataContext.Comments where c.BlogPostId == id select c);

            return View(Blog);

        }
        public IActionResult EditBlogPost(int id)
        {
            User user = null;
            var jUser = HttpContext.Session.GetString("user");
            if (jUser != null)
            {
                user = JsonConvert.DeserializeObject<User>(jUser);
                ViewData["UserId"] = user.UserId;

                ViewData["FirstName"] = user.FirstName;
                ViewData["LastName"] = user.LastName;
                if (user.RoleId == 2)
                    ViewData["RoleId"] = user.RoleId;
            }
            else
            {
                ViewData["UserId"] = null;
            }

            var EditedBlog = (from c in _Assignment1DataContext.BlogPosts where c.BlogPostId == id select c).FirstOrDefault();
            return View(EditedBlog);

        }

        public IActionResult ChangePost(BlogPost post)
        {
            var id = Convert.ToInt32(Request.Form["BlogPostId"]);

            var EditedBlog = (from b in _Assignment1DataContext.BlogPosts where b.BlogPostId == id select b).FirstOrDefault();
            EditedBlog.Title = post.Title;
            EditedBlog.Content = post.Content;
            EditedBlog.Posted = post.Posted;

            _Assignment1DataContext.SaveChanges();

            return RedirectToAction("Index");
        }

        public IActionResult CommentBlogPost(int id)
        {
            var UserId = Convert.ToInt32(Request.Form["UserId"]);
            Comment comment = new Comment();

            comment.BlogPostId = id;
            comment.Content = HttpContext.Request.Form["comment"];
            comment.UserId = UserId;

            _Assignment1DataContext.Comments.Add(comment);
            _Assignment1DataContext.SaveChanges();

            return RedirectToAction("Index");
        }
    }
}
