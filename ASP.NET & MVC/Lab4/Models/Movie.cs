using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Threading.Tasks;

namespace Lab4.Models
{
    public class Movie
    {
        public int MovieId
        {
            get;
            set;
        }
        [Required]
        [StringLength(1000)]
        public string Title
        {
            get;
            set;
        }
        [Required]
        [StringLength(1000)]
        public string SubTitle
        {
            get;
            set;
        }
        [Required]
        [StringLength(1000)]
        public string Descript
        {
            get;
            set;
        }
        [Required]
        [DataType(DataType.Date)]
        public DateTime Years
        {
            get;
            set;
        }
        [Required]
        [Range(1,5)]
        public int Rating
        {
            get;
            set;
        }
    }
}