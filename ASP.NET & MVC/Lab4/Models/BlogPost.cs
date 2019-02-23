using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Threading.Tasks;

namespace Lab4.Models
{
    public class BlogPost
    {
        public int BlogPostId
        {
            get;
            set;
        }

        [ForeignKey("UserId")]
        public int UserId { get; set;   } 
        public User User { get; set; }

        [StringLength(100)]
        public string Title
        {
            get;
            set;
        }

        [StringLength(100)]
        public string Content
        {
            get;
            set;
        }
        [Required]
        [DataType(DataType.Date)]
        public DateTime Posted
        {
            get;
            set;
        }
        public ICollection<Comment> Comments{ get; set; }
    }
}
