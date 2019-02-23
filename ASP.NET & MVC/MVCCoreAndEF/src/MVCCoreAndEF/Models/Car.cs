using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace MVCCoreAndEF.Models
{
    public class Car
    {
        public int CarId
        {
            get;
            set;
        }

        [Required]
        [StringLength(1000)]
        public string Model
        {
            get;
            set;
        }
    }
}
