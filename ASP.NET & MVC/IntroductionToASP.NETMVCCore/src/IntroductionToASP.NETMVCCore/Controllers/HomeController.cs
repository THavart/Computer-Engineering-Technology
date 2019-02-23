using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Http;
using IntroductionToASP.NETMVCCore.Models;

// For more information on enabling MVC for empty projects, visit http://go.microsoft.com/fwlink/?LinkID=397860

namespace IntroductionToASP.NETMVCCore.Controllers
{
    public class HomeController : Controller
    {
        [HttpGet]
        public IActionResult Index()
        {
            return View();
        }

        [HttpGet]
        public IActionResult Razor()
        {
            return View();
        }

        [HttpGet]
        public IActionResult CreateSession()
        {
            return View();
        }

        [HttpPost]
        public IActionResult DisplaySession()
        {
            HttpContext.Session.SetString("emailAddress", Request.Form["emailAddress"]);
            HttpContext.Session.SetString("password", Request.Form["password"]); // note you probably wouldn't normally save this value

            return View();
        }

        [HttpGet]
        public IActionResult Form()
        {
            return View();
        }

        [HttpPost]
        public IActionResult DisplayForm(LoginInformationModel model)
        {
            return View(model);
        }
    }
}
