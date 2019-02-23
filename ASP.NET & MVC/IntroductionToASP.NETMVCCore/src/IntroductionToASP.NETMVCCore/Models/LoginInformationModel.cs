using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace IntroductionToASP.NETMVCCore.Models
{
    public class LoginInformationModel
    {
        [Required]
        [StringLength(255)]
        [EmailAddress]
        public string EmailAddress
        {
            get;
            set;
        }

        [Required]
        [StringLength(100)]
        public string Password
        {
            get;
            set;
        }
    }
}
