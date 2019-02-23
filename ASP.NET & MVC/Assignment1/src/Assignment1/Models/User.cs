using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Threading.Tasks;

namespace Assignment1.Models
{
    public class User
    {
        public int UserId
        {
            get;
            set;
        }

        [ForeignKey("Role")]
        public int RoleId
        {
            get;
            set;
        }

        public string FirstName
        {
            get;
            set;
        }
        public string LastName
        {
            get;
            set;
        }

        [Required]
        public string EmailAddress
        {
            get;
            set;
        }
        public string Password
        {
            get;
            set;
        }
    }
}
