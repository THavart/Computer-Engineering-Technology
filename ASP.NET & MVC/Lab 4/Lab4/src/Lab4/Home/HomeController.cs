using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Lab4.Models;


namespace Lab4.Controllers
{
    public class HomeController : Controller
    {
        private MovieContext _movieContext;


        public HomeController(MovieContext context)
        {
            _movieContext = context;
        }

        public IActionResult Index()
        {

            return View(_movieContext.Movie.ToList());
        }


        public IActionResult AddMovie()
        {
            return View();
        }

        /// <summary>
        /// 
        /// </summary>
        /// <returns></returns>
        public IActionResult CreateMovie(Movie Movie)
        {
            _movieContext.Movie.Add(Movie);
            _movieContext.SaveChanges();

            return RedirectToAction("Index");
        }

        /// <summary>
        /// 
        /// </summary>
        /// <returns></returns>
        public IActionResult EditMovie(int id)
        {
            var MovieToUpdate = (from c in _movieContext.Movie where c.MovieId == id select c).FirstOrDefault();

            return View(MovieToUpdate);
        }

        /// <summary>
        /// 
        /// </summary>
        /// <returns></returns>
        public IActionResult ModifyMovie(Movie movie)
        {
            var id = Convert.ToInt32(Request.Form["MovieId"]);

            var MovieToUpdate = (from c in _movieContext.Movie where c.MovieId == id select c).FirstOrDefault();
            MovieToUpdate.Model = movie.Model;
            MovieToUpdate.SubTitle = movie.SubTitle;
            MovieToUpdate.Description = movie.Description;
            MovieToUpdate.Year = movie.Year;
            MovieToUpdate.Rating = movie.Rating;

            _movieContext.SaveChanges();

            return RedirectToAction("Index");
        }

        public IActionResult DeleteMovie(int id)
        {
            var MovieToDelete = (from c in _movieContext.Movie where c.MovieId == id select c).FirstOrDefault();

            _movieContext.Movie.Remove(MovieToDelete);

            _movieContext.SaveChanges();

            return RedirectToAction("Index");
        }
    }
}
