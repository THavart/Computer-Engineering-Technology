using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Threading.Tasks;

namespace Lab4.Models
{
    public class Comment
    {
        public int CommentId
        {
            get;
            set;
        }

        public int BlogPostId
        {
            get;
            set;
        }
        [ForeignKey("BlogPostId")]
        public BlogPost BLogPost{ get; set; }

        public int UserId
        {
            get;
            set;
        }
        [ForeignKey("UserId")]
        public User User { get; set; }

        public string Content
        {
            get;
            set;
        }

    }
}
