using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using MVCCoreAndEF.Models;

// For more information on enabling MVC for empty projects, visit http://go.microsoft.com/fwlink/?LinkID=397860

namespace MVCCoreAndEF.Controllers
{
    public class HomeController : Controller
    {
        private CarContext _carContext;

        /// <summary>
        /// 
        /// </summary>
        /// <param name="context"></param>
        public HomeController(CarContext context)
        {
            _carContext = context;
        }

        /// <summary>
        /// 
        /// </summary>
        /// <returns></returns>
        public IActionResult Index()
        {
            // if you get an error here be sure to run the script to generate the database
            // also, obviously make sure that sql server express is installed
            /*
                USE [master]                
                GO                
                CREATE DATABASE [MVCCoreAndEF]                
                GO                
                USE [MVCCoreAndEF]                
                CREATE TABLE Cars (                
                    CarId int not null primary key identity(1,1),                
                    Model nvarchar(1000) not null                
                )
            */
            // if you still get an error after running the database script change the connection string in Startup.cs
            // from @"Server=localhost;Database=MVCCoreAndEF;Trusted_Connection=True;MultipleActiveResultSets=true;";
            // to   @"Server=localhost\SQLEXPRESS;Database=MVCCoreAndEF;Trusted_Connection=True;MultipleActiveResultSets=true;";
            // if you still get an error, find me :)

            return View(_carContext.Cars.ToList());
        }

        /// <summary>
        /// 
        /// </summary>
        /// <returns></returns>
        public IActionResult AddCar()
        {
            return View();
        }

        /// <summary>
        /// 
        /// </summary>
        /// <returns></returns>
        public IActionResult CreateCar(Car car)
        {
            _carContext.Cars.Add(car);
            _carContext.SaveChanges();

            return RedirectToAction("Index");
        }

        /// <summary>
        /// 
        /// </summary>
        /// <returns></returns>
        public IActionResult EditCar(int id)
        {
            var carToUpdate = (from c in _carContext.Cars where c.CarId == id select c).FirstOrDefault();

            return View(carToUpdate);
        }

        /// <summary>
        /// 
        /// </summary>
        /// <returns></returns>
        public IActionResult ModifyCar(Car car)
        {
            var id = Convert.ToInt32(Request.Form["CarId"]);

            var carToUpdate = (from c in _carContext.Cars where c.CarId == id select c).FirstOrDefault();
            carToUpdate.Model = car.Model;

            _carContext.SaveChanges();

            return RedirectToAction("Index");
        }
    }
}
